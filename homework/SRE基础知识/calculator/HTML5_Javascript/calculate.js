function cal(str){
    let result = 0;
    let addList = str.split("+"); // 拆分加法
    for (let i=0; i<addList.length; i++){ // 遍历列表, 计算列表中的减法算式
        let subResult = 0;
        let subList = [];
        if (addList[i].search("-") != -1){ // 拆分减法，判断是否存在 "-" 字符，防止无差别放入减法列表
            subList = addList[i].split("-");
            let num = multiAndDivide(subList[0]);
            if (num === false){
                return false;
            }
            subResult = num;
        }else{
            let num = multiAndDivide(addList[i]); // 计算加法列表中算式的值
            if (num === false){
                return false;
            }
            subResult = num;
        }
        for (let j=1; j<subList.length; j++){ // 遍历减法列表计算列表中各算式的值
            let num = multiAndDivide(subList[j]);
            if(num === false){
                return false;
            }
            else{
                subResult -= num;
            }
        }
        result += subResult;
    }
    return result;
}

// 计算乘除法算式
function multiAndDivide(str){
    let result = undefined;
    let num = "";
    let char = "";
    for (let i=0; i<str.length; i++){
        if (/^[\d.]/.test(str.charAt(i))){ // 匹配出完整的数字 存入 num 变量中
            num = num + str.charAt(i);
            if (i != str.length - 1){ // 遍历到最后一个字符时停止匹配数字，执行下面的计算步骤
                continue;
            }
        }
        if (result === undefined){ // 给 result 赋初始值
            result = Number(num);
            num = "";
            char = str.charAt(i);
            continue;
        }
        switch(char){ // 匹配运算符进行相应的运算
        case "×":
            result *= Number(num);
            num = "";
            break;
        case "÷":
            if (/^0+$/.test(num)){ // 防止除数为 0
                return false;
            }
            result /= Number(num);
            num = "";
            break;
        default:
            break;
        }
        if (i != str.length - 1){
            char = str.charAt(i);
        }
    }
    return result;
}

// eslint-disable-next-line no-unused-vars
function insert(char){
    var box = document.getElementById("text-box");
    if (/^[+×÷]/.test(char) || char == "-"){
        if (/^\d/.test(box.value.charAt(box.value.length-1))){
            box.value = box.value + char;
        }
    }else if (/^\d/.test(char)){
        if (box.value == "0"){
            box.value = char;
        }else{
            box.value = box.value + char;
        }
    }else if (char == "."){
        if (/^-?\d+$/.test(box.value)){// 判断输入框中是否只存在一个数字，并且不是小数，此时直接追加小数点
            box.value = box.value + ".";
            return;
        }
        for (let i = box.value.length-1; i>=0; i--){
            if (/^[^\d]/.test(box.value.charAt(i)) && i != box.value.length - 1){ // 循环找到前面完整的数字
                if (box.value.charAt(i) != "."){ // 如果找到的第一个非数字不是小数点则向 text-box 中追加小数点
                    box.value = box.value + ".";
                }
                break;
            }
        }
    }else if (char == "←"){
        if (box.value.length > 0){
            box.value = box.value.substring(0, box.value.length-1);
        }
    }else if (char == "C"){
        box.value = "";
    }else if (char == "="){
        var str = box.value;
        if (!/^\d/.test(box.value.charAt(box.value.length-1))){ // 计算结果前判断最后一个字符是否是数字以外的其他字符，并去掉非数字字符
            str = str.substring(0, str.length - 1);
        }
        let result = cal(str);
        if (result === false){
            box.value = "Calculation Error";
        }else{
            box.value = result;
        }
    }
}
