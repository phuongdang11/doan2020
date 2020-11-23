function Validator (options){

    var formElement = document.querySelector(options.form);

    var SelectorRules = {};
    

    function Validate(inputElement, rule){
        var errorMs = rule.test(inputElement.value);
        var errorForm = inputElement.parentElement.querySelector('.form-message');
            if(errorMs){
                errorForm.innerText = errorMs;
                inputElement.parentElement.classList.add('invalid');
            }else{
                errorForm.innerText = '';
                inputElement.parentElement.classList.remove('invalid');
            }
    }
    

    if(formElement){
        options.rules.forEach(function (rule){

            //lưu
            // SelectorRules[rule.selector] = rule.test;
            if(Array.isArray(SelectorRules[rule.selector])){
                SelectorRules[rule.selector].push(rule.test);
            }else{
                SelectorRules[rule.selector] = [rule.test];
            }

            var inputElement = formElement.querySelector(rule.selector);
            var errorForm = inputElement.parentElement.querySelector('.form-message');
            if(inputElement){
                //Blur
                inputElement.onblur = function(){
                    Validate(inputElement, rule);
                }
                //Nhập vào input
                inputElement.oninput = function(){
                    errorForm.innerText = "";
                    inputElement.parentElement.classList.remove('invalid');
                }
            }
        });
    }
}

Validator.isRequired = function (selector, message){
    return {
        selector : selector,
        test : function(value){
            return value.trim() ? undefined : message || 'Vui lòng nhập tên';
        }
    };
}

Validator.isEmail = function (selector, message){
    return {
        selector : selector,
        test : function(value){
            var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập email';
        }
    };
}

Validator.minLength = function (selector, min, message){
    return {
        selector : selector,
        test : function(value){
            return value.length >= min ? undefined : message || `Vui lòng nhập ${min} kí tự`;
        }
    };
}

Validator.confirm = function (selector, getConfirm, message){
    return {
        selector : selector,
        test : function(value){
            return value === getConfirm() ? undefined : message || `Giá trị không giống nhau`;
        }
    };
}