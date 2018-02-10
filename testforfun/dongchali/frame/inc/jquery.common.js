$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
//$.fn.serializeObject = function () {
//    if (!this.length) { return false; }

//    var $el = this,
//      data = {},
//      lookup = data; //current reference of data  

//    $el.find(':input[type!="checkbox"][type!="radio"], input:checked').each(function () {
//        // data[a][b] becomes [ data, a, b ]  
//        var named = this.name.replace(/\[([^\]]+)?\]/g, ',$1').split(','),
//            cap = named.length - 1,
//            i = 0;

//        for (; i < cap; i++) {
//            // move down the tree - create objects or array if necessary  
//            lookup = lookup[named[i]] = lookup[named[i]] ||
//                (named[i + 1] == "" ? [] : {});
//        }

//        // at the end, psuh or assign the value  
//        if (lookup.length != undefined) {
//            lookup.push($(this).val());
//        } else {
//            lookup[named[cap]] = $(this).val();
//        }

//        // assign the reference back to root  
//        lookup = data;
//    });

//    return data;
//};
//$.fn.serializeObject = function () {
//    var o = Object.create(null),
//        elementMapper = function (element) {
//            element.name = $.camelCase(element.name);
//            return element;
//        },
//        appendToResult = function (i, element) {
//            var node = o[element.name];

//            if ('undefined' != typeof node && node !== null) {
//                o[element.name] = node.push ? node.push(element.value) : [node, element.value];
//            } else {
//                o[element.name] = element.value;
//            }
//        };

//    $.each($.map(this.serializeArray(), elementMapper), appendToResult);
//    return o;
//};

(function ($) {
    function toIntegersAtLease(n)
    { return n < 10 ? '0' + n : n; }
    Date.prototype.toJSON = function (date) {
        return this.getUTCFullYear() + '-' +
toIntegersAtLease(this.getUTCMonth()) + '-' +
toIntegersAtLease(this.getUTCDate());
    }; var escapeable = /["\\\x00-\x1f\x7f-\x9f]/g; var meta = { '\b': '\\b', '\t': '\\t', '\n': '\\n', '\f': '\\f', '\r': '\\r', '"': '\\"', '\\': '\\\\' }; $.quoteString = function (string) {
        if (escapeable.test(string)) {
            return '"' + string.replace(escapeable, function (a) {
                var c = meta[a]; if (typeof c === 'string') { return c; }
                c = a.charCodeAt(); return '\\u00' + Math.floor(c / 16).toString(16) + (c % 16).toString(16);
            }) + '"';
        }
        return '"' + string + '"';
    }; $.toJSON = function (o, compact) {
        var type = typeof (o); if (type == "undefined")
            return "undefined"; else if (type == "number" || type == "boolean")
            return o + ""; else if (o === null)
            return "null"; if (type == "string")
        { return $.quoteString(o); }
        if (type == "object" && typeof o.toJSON == "function")
            return o.toJSON(compact); if (type != "function" && typeof (o.length) == "number") {
            var ret = []; for (var i = 0; i < o.length; i++) { ret.push($.toJSON(o[i], compact)); }
            if (compact)
                return "[" + ret.join(",") + "]"; else
                return "[" + ret.join(", ") + "]";
        }
        if (type == "function") { throw new TypeError("Unable to convert object of type 'function' to json."); }
        var ret = []; for (var k in o) {
            var name; type = typeof (k); if (type == "number")
                name = '"' + k + '"'; else if (type == "string")
                name = $.quoteString(k); else
                continue; var val = $.toJSON(o[k], compact); if (typeof (val) != "string") { continue; }
            if (compact)
                ret.push(name + ":" + val); else
                ret.push(name + ": " + val);
        }
        return "{" + ret.join(", ") + "}";
    }; $.compactJSON = function (o)
    { return $.toJSON(o, true); }; $.evalJSON = function (src)
    { return eval("(" + src + ")"); }; $.secureEvalJSON = function (src) {
        var filtered = src; filtered = filtered.replace(/\\["\\\/bfnrtu]/g, '@'); filtered = filtered.replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, ']'); filtered = filtered.replace(/(?:^|:|,)(?:\s*\[)+/g, ''); if (/^[\],:{}\s]*$/.test(filtered))
            return eval("(" + src + ")"); else
            throw new SyntaxError("Error parsing JSON, source is not valid.");
    };
})(jQuery);