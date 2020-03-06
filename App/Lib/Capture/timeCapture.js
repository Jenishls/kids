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
    margin: '1cm',
    header: {
        height: "3.5cm",
        contents: phantom.callback(function(pageNum, numPages) {
            return `
            <table style="width:100%;">
                <tr>
                    <td style="text-align:left;">
                        <img src="data:image/png;base64, '++" alt="" style=";margin-bottom: 30px;">
                    </td>
                    <td style="text-align:right;padding:0px;">
                        <span style="margin-bottom: 30px;margin-top:0px;font-size:14px;">
                            404 W. Powell Lane <br>
                            #203 <br>
                            Austin, TX - 78753<br/>
                            (512) 298-1111
                        </span>
                    </td>
                </tr>
            </table>`;
        })
    },
    footer: {
        height: "1.5cm",
        contents: phantom.callback(function(pageNum, numPages) {
            return "<div style='width: 100%; text-transform: uppercase; text-align: center; font-family: Poppins, sans-serif; font-size: 12px; line-height: 11px; color: #153643;'><hr><strong></strong><br><br><span style='float:right;font-size:11px;'>" + pageNum + " / " + numPages + "</span>" +
                "</div>";
        })
    }
};

window.setTimeout(function () {
    page.render(args[1], { format: 'pdf', quality: '100' });
    phantom.exit();
}, args[1]);
