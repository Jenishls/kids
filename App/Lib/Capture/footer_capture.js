/**
 * THIS INTELLECTUAL PROPERTY IS COPYRIGHT Ⓒ 2020
 * SYSTHA TECH LLC. ALL RIGHT RESERVED
 */
var fs = require('fs'),
    args = require('system').args,
    page = require('webpage').create();

page.content = fs.read(args[1]);

page.paperSize = {
    format: 'A4',
    orientation: 'landscape',
    margin: "1cm",
    // footer: {
    //     height: "1.5cm",
    //     contents: phantom.callback(function(pageNum, numPages) {
    //         return "<div style='width: 100%; text-transform: uppercase; text-align: center; font-family: Poppins, sans-serif; font-size: 12px; line-height: 11px; color: #153643;'><hr><strong>Shubhu Tech Support System. Chabahil. Kathmandu . Province 3 .</strong><br><br><span style='float:right;font-size:11px;'>" + pageNum + " / " + numPages + "</span>"+
    //         "</div>";
    //     })
    // }
};

window.setTimeout(function() {
    page.render(args[1], { format: 'pdf', quality: '100' });
    phantom.exit();
}, 1000);