<?php
/**
 *
 */

namespace Response\Psr;

use Psr\Http\Message\StreamInterface;
use Slim\Http\RequestBody;

class Send
{
    /**
     * @param Response $response
     * @copyright Copyright (c) 2011-2016 Josh Lockhart. (http://slimframework.com)
     * @license https://github.com/slimphp/Slim/blob/3.x/LICENSE.md (MIT License)
     * @return void
     */
    public function __invoke(Response $response)
    {
        // Send response
        if (!headers_sent()) {
            // Status
            header(sprintf(
                'HTTP/%s %s %s',
                $response->getProtocolVersion(),
                $response->getStatusCode(),
                $response->getReasonPhrase()
            ));

            // Headers
            foreach ($response->getHeaders() as $name => $values) {
                foreach ($values as $value) {
                    header(sprintf('%s: %s', $name, $value), false);
                }
            }
        }

        // Body
        if (in_array($response->getStatusCode(), [204, 205, 304])) {
            return;
        }

        $body = $response->getBody();

        //--- mvc5
        if (!$body instanceof StreamInterface) {
            $stream = new RequestBody;
            $stream->write((string) $body);
            $body = $stream;
        }
        //--- end

        if ($body->isSeekable()) {
            $body->rewind();
        }

        //--- mvc5 hard coded
        $chunkSize = 4096;
        //--- end

        $contentLength  = $response->getHeaderLine('Content-Length');

        if (!$contentLength) {
            $contentLength = $body->getSize();
        }

        if (isset($contentLength)) {
            $totalChunks    = ceil($contentLength / $chunkSize);
            $lastChunkSize  = $contentLength % $chunkSize;
            $currentChunk   = 0;
            while (!$body->eof() && $currentChunk < $totalChunks) {
                if (++$currentChunk == $totalChunks && $lastChunkSize > 0) {
                    $chunkSize = $lastChunkSize;
                }
                echo $body->read($chunkSize);
                if (connection_status() != CONNECTION_NORMAL) {
                    break;
                }
            }
        } else {
            while (!$body->eof()) {
                echo $body->read($chunkSize);
                if (connection_status() != CONNECTION_NORMAL) {
                    break;
                }
            }
        }
    }
}
