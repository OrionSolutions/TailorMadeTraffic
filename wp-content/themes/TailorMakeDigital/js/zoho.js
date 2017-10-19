function trimBoth(str) {
            return jQuery.trim(str);
        }

        function setAllDependancyFieldsMapping() {
            var mapDependancyLabels = getMapDependenySelectValues(jQuery("[id='property(module)']").val(), "JSON_MAP_DEP_LABELS");
            if (mapDependancyLabels) {
                for (var i = 0; i < mapDependancyLabels.length; i++) {
                    var label = mapDependancyLabels[i];
                    var obj = document.forms['zsWebToCase_5015000000025226'][label];
                    if (obj) {
                        setDependent(obj, true);
                    }
                }
            }
        }

        function getMapDependenySelectValues(module, key) {
            var dependencyObj = jQuery.parseJSON(jQuery("[id='dependent_field_values_" + module + "']").val());
            if (dependencyObj == undefined) {
                return dependencyObj;
            }
            return dependencyObj[key];
        }

        function setDependent(obj, isload) {
            var name = obj.id || (obj[0] && obj[0].id) || "";
            var module = jQuery("[id='property(module)']").val();
            var val = "";
            var myObject = getMapDependenySelectValues(module, "JSON_VALUES");
            if (myObject != undefined) {
                val = myObject[name];
            }
            var mySelObject = getMapDependenySelectValues(module, "JSON_SELECT_VALUES");
            if (val != null && val != "" && val != "null" && mySelObject) {
                var fields = val;
                for (var i in fields) {
                    if (fields.hasOwnProperty(i)) {
                        var isDependent = false;
                        var label = i;
                        var values = fields[i];
                        if (label.indexOf(")") > -1) {
                            label = label.replace(/\)/g, '_____');
                        }
                        if (label.indexOf("(") > -1) {
                            label = label.replace(/\(/g, '____');
                        }
                        if (label.indexOf(".") > -1) {
                            label = label.replace(/\./g, '___');
                        }
                        var depObj = document.forms['zsWebToCase_5015000000025226'][label];
                        if (depObj && depObj.options) {
                            var mapValues = "";
                            var selected_val = depObj.value;
                            var depLen = depObj.options.length - 1;
                            for (var n = depLen; n >= 0; n--) {
                                if (depObj.options[n].selected) {
                                    if (mapValues == "") {
                                        mapValues = depObj.options[n].value;
                                    } else {
                                        mapValues = mapValues + ";;;" + depObj.options[n].value;
                                    }
                                }
                            }
                            depObj.value = "";
                            var selectValues = mySelObject[label];
                            for (var k in values) {
                                var rat = k;
                                if (rat == "-None-") {
                                    rat = "";
                                }
                                var parentValues = mySelObject[name];
                                if (rat == trimBoth(obj.value)) {
                                    isDependent = true;
                                    depObj.length = 0;
                                    var depvalues = values[k];
                                    var depLen = depvalues.length - 1;
                                    for (var j = 0; j <= depLen; j++) {
                                        var optionElement = document.createElement("OPTION");
                                        var displayValue = depvalues[j];
                                        var actualValue = displayValue;
                                        if (actualValue == "-None-") {
                                            optionElement.value = "";
                                            displayValue = "-None-";
                                        } else {
                                            optionElement.value = actualValue;
                                        }
                                        optionElement.text = displayValue;
                                        if (mapValues != undefined) {
                                            var mapValue = mapValues.split(";;;");
                                            var len = mapValue.length;
                                            for (var p = 0; p < len; p++) {
                                                if (actualValue == mapValue[p]) {
                                                    optionElement.selected = true;
                                                }
                                            }
                                        }
                                        depObj.options.add(optionElement);
                                    }
                                }
                            }
                            if (!isDependent) {
                                depObj.length = 0;
                                var len = selectValues.length;
                                for (var j = 0; j < len; j++) {
                                    var actualValue = selectValues[j];
                                    var optionElement = document.createElement("OPTION");
                                    if (actualValue == "-None-") {
                                        optionElement.value = "";
                                    } else {
                                        optionElement.value = selectValues[j];
                                    }
                                    optionElement.text = selectValues[j];
                                    depObj.options.add(optionElement);
                                }
                                depObj.value = selected_val;
                            }
                            if (!isload) {
                                setDependent(depObj, false);
                            }
                            var jdepObj = jQuery(depObj);
                            if (jdepObj.hasClass('select2-offscreen')) {
                                jdepObj.select2("val", jdepObj.val());
                            }
                        }
                    }
                }
            }
        }
        var zctt = function() {
            var tt, mw = 400,
                top = 10,
                left = 0,
                doctt = document;
            var ieb = doctt.all ? true : false;
            return {
                showtt: function(cont, wid) {
                    if (tt == null) {
                        tt = doctt.createElement('div');
                        tt.setAttribute('id', 'tooltip-zc');
                        doctt.body.appendChild(tt);
                        doctt.onmousemove = this.setpos;
                        doctt.onclick = this.hidett;
                    }
                    tt.style.display = 'block';
                    tt.innerHTML = cont;
                    tt.style.width = wid ? wid + 'px' : 'auto';
                    if (!wid && ieb) {
                        tt.style.width = tt.offsetWidth;
                    }
                    if (tt.offsetWidth > mw) {
                        tt.style.width = mw + 'px'
                    }
                    h = parseInt(tt.offsetHeight) + top;
                    w = parseInt(tt.offsetWidth) + left;
                },
                hidett: function() {
                    tt.style.display = 'none';
                },
                setpos: function(e) {
                    var u = ieb ? event.clientY + doctt.body.scrollTop : e.pageY;
                    var l = ieb ? event.clientX + doctt.body.scrollLeft : e.pageX;
                    var cw = doctt.body.clientWidth;
                    var ch = doctt.body.clientHeight;
                    if (l < 0) {
                        tt.style.left = left + 'px';
                        tt.style.right = '';
                    } else if ((l + w + left) > cw) {
                        tt.style.left = '';
                        tt.style.right = ((cw - l) + left) + 'px';
                    } else {
                        tt.style.right = '';
                        tt.style.left = (l + left) + 'px';
                    }
                    if (u < 0) {
                        tt.style.top = top + 'px';
                        tt.style.bottom = '';
                    } else if ((u + h + left) > ch) {
                        tt.style.top = '';
                        tt.style.bottom = ((ch - u) + top) + 'px';
                    } else {
                        tt.style.bottom = '';
                        tt.style.top = (u + top) + 'px';
                    }
                }
            };
        }();
        var zsWebFormMandatoryFields = new Array('Contact Name', 'Email', 'Subject');
        var zsFieldsDisplayLabelArray = new Array('Last Name', 'Email', 'Subject');

        function zsValidateMandatoryFields() {
            var name = '';
            var email = '';
            var isError = 0;
            for (var index = 0; index < zsWebFormMandatoryFields.length; index++) {
                isError = 0;
                var fieldObject = document.forms['zsWebToCase_5015000000025226'][zsWebFormMandatoryFields[index]];
                if (fieldObject) {
                    if (((fieldObject.value).replace(/^\s+|\s+$/g, '')).length == 0) {
                        alert(zsFieldsDisplayLabelArray[index] + ' cannot be empty ');
                        fieldObject.focus();
                        isError = 1;
                        return false;
                    } else {
                        if (fieldObject.name == 'Email') {
                            if (!fieldObject.value.match(/[A-Za-z0-9._%\-+]+@[A-Za-z0-9.\-]+\.[a-zA-Z]{2,22}/)) {
                                isError = 1;
                                alert('Enter a valid email-Id');
                                fieldObject.focus();
                                return false;
                            }
                        }
                    }
                    if (fieldObject.nodeName == 'SELECT') {
                        if (fieldObject.options[fieldObject.selectedIndex].value == '-None-') {
                            alert(zsFieldsDisplayLabelArray[index] + ' cannot be none');
                            fieldObject.focus();
                            isError = 1;
                            return false;
                        }
                    }
                    if (fieldObject.type == 'checkbox') {
                        if (fieldObject.checked == false) {
                            alert('Please accept ' + zsFieldsDisplayLabelArray[index]);
                            fieldObject.focus();
                            isError = 1;
                            return false;
                        }
                    }
                }
            }
            if (isError == 0) {
                document.getElementById('zsSubmitButton_5015000000025226').setAttribute('disabled', 'disabled');
            }
        }
        document.onreadystatechange = function() {
            setAllDependancyFieldsMapping();
            document.getElementById('zsSubmitButton_5015000000025226').removeAttribute('disabled');
        };

        function zsResetWebForm(webFormId) {
            document.forms['zsWebToCase_' + webFormId].reset();
            document.getElementById('zsSubmitButton_5015000000025226').removeAttribute('disabled');
            setAllDependancyFieldsMapping();
        }