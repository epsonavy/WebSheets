/**
 * Defines a class for drawing and editing spreadsheets within a tag with
 *
 * Example uses:
 * spreadsheet = new Spreadsheet(some_html_element_id, 
 *     [["Tom",5],["Sally", 6]]); //read-only
 * spreadsheet.draw();
 *
 * spreadsheet2 = new Spreadsheet(some_html_element_id2, 
 *     [["Tom",5],["Sally", 6]], {"mode":"write"}); //editable
 * spreadsheet2.draw();
 *
 * @param String spreadsheet_id the id of the tag in which to draw the
 *      spreadsheet
 * @param Array supplied_data two dimensional array of the rows and columns
 *      of data for the spreadsheet
 */
function Spreadsheet(spreadsheet_id, supplied_data)
{
    var self = this;
    var p = Spreadsheet.prototype;
    var properties = (typeof arguments[2] !== 'undefined') ?
        arguments[2] : {};
    var container = document.getElementById(spreadsheet_id);
    if (!container) {
        return false;
    }
    supplied_data = eval(supplied_data);
    if (!Array.isArray(supplied_data)) {
        supplied_data = [];
    }
    var width = 0;
    for (index in supplied_data) {
        if (!Array.isArray(supplied_data[index])) {
            supplied_data[index] = [];
        }
        if ([index].length > width) {
            width = supplied_data[index].length;
        }
    }
    var length = supplied_data.length;
    var data = [];
    for (var i = 0; i < length; i++) {
        data[i] = [];
        for (var j = 0; j < width; j++) {
            data[i][j] = (typeof supplied_data[i][j] == 'undefined') ? "" :
                supplied_data[i][j];
        }
    }
    var property_defaults = {
        'mode' : 'read', // currently, only supports csv
        'data_id' : spreadsheet_id + "-data",
        'data_name' : 'page',
        'table_style' : 'overflow:auto;height:6in;',
    };
    for (var property_key in property_defaults) {
        if (typeof properties[property_key] !== 'undefined') {
            this[property_key] = properties[property_key];
        } else {
            this[property_key] = property_defaults[property_key];
        }
    }
    /**
     * Main function used to draw the spreadsheet with the container tag
     */
    p.draw = function()
    {
        //used to draw a csv based on spreadsheet data
        var table = "<div style='" + self.table_style + "'>";
        var length = data.length;
        var width = data[0].length;
        var add_button = "";
        var delete_button = "";
        var pre_delete_button = "";
        if (self.mode == 'write') {
            table += "<input id='" + self.data_id+ "' type='hidden' " +
                "name='" + self.data_name + "' value='" + JSON.stringify(
                data)+ "' />";
            add_button = "<button>+</button>";
            pre_delete_button = "<button>-</button>";
        }
        table += "<table border='1' ><tr><th></th>";
        for (var i = 0; i < width; i++) {
            table += "<th style='min-width:1in;text-align:right;'>" +
                delete_button + self.letterRepresentation(i) + add_button +
                "</th>";
            delete_button = pre_delete_button;
        }
        table += "</tr>";
        delete_button = "";
        for (i = 0; i < length; i++) {
            table +="<tr><th style='min-width:1.1in;text-align:right;'>" +
                delete_button + (i + 1) + add_button + "</th>";
            delete_button = pre_delete_button;
            for (var j = 0; j < width; j++) {
                var item = "";
                if (typeof data[i][j] == 'string') {
                    item = data[i][j];
                    if (item.charAt(0) == '=') {
                        item = self.evaluateCell(item.substring(1), 0)[1];
                    }
                }
                table += "<td>" + item + "</td>";
            }
            table += "</tr>";
        }
        table += "</table></div>";
        container.innerHTML = table;
    }

    