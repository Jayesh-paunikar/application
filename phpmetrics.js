//http://slimerjs.org/

var page = require('webpage').create();
    page.viewportSize = { width:1280, height:800 };

page.open('http://localhost/mvc5.html')
    .then(function(){

        window.setTimeout(function() {

            page.clipRect = { top: 212, left: 55, width: 300, height: 280 };

            page.render('vendor/mvc5/tests/public/images/phpmetric-maintenability.png');

            page.clipRect = { top: 210, left: 400, width: 300, height: 275 };

            page.render('vendor/mvc5/tests/public/images/phpmetric-custom.png');

            page.clipRect = { top: 255, left: 750, width: 300, height: 275 };

            page.render('vendor/mvc5/tests/public/images/phpmetric-abstractness.png');

            page.evaluate(function () {
                return document.querySelector("#link-score a").click();
            });

            window.setTimeout(function() {
                page.clipRect = {top: 170, left: 65, width: 560, height: 560};

                page.render('vendor/mvc5/tests/public/images/phpmetric-evaluation.png');

                page.clipRect = {top: 315, left: 645, width: 560, height: 200};

                page.render('vendor/mvc5/tests/public/images/phpmetric-eval-report.png');

                page.close();
                phantom.exit();
            },
            3000);

        },
        3000);
    })
