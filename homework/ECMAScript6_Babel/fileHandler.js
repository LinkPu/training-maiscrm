// eslint-disable-next-line no-undef
const fs = require("fs");


// 异步读取文件
const readFile = (filePath) => {
    return new Promise((reslove, reject) => {
        fs.readFile(filePath, "utf8", (err, data) => {
            if (!err) {
                reslove(data);
            } else {
                reject(err);
            }
        });
    });
};

// 异步写入文件
const writeFile = (filePath, data) => {
    return new Promise((reslove, reject) => {
        fs.writeFile(filePath, data, (err) => {
            if (!err) {
                reslove(data);
            } else {
                reject(err);
            }
        });
    });
};

// 冒泡排序
function bubbleSort(arr) {
    var len = arr.length;
    for (var i = 0; i < len; i++) {
        var swapped = false;
        for (var j = 0; j < len - 1 - i; j++) {
            if (arr[j] > arr[j+1]) {
                var temp = arr[j+1];
                arr[j+1] = arr[j];
                arr[j] = temp;
                swapped = true;
            }
        }
        if (!swapped){
            break;
        }
    }
    return arr;
}

// 读取input文件中逗号相隔的数字，并排序
const handleData = async (filePathForRead,filePathForWrite)=>{
    const readData = await readFile(filePathForRead);
    //读取数据并转换为数字数组。
    const readDataArr = readData.split(",").map( ele=> +ele );
    const data = bubbleSort(readDataArr).join(","); // 冒泡排序
    const output = await writeFile(filePathForWrite,data); // 写入数据
    console.log(output);
};

handleData("./input.txt","./output.txt");
