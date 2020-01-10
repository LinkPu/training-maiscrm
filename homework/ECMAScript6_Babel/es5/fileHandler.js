"use strict";

// eslint-disable-next-line no-undef
var fs = require("fs");

// 异步读取文件
var readFile = function readFile(filePath) {
    return new Promise(function (reslove, reject) {
        fs.readFile(filePath, "utf8", function (err, data) {
            if (!err) {
                reslove(data);
            } else {
                reject(err);
            }
        });
    });
};

// 异步写入文件
var writeFile = function writeFile(filePath, data) {
    return new Promise(function (reslove, reject) {
        fs.writeFile(filePath, data, function (err) {
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
            if (arr[j] > arr[j + 1]) {
                var temp = arr[j + 1];
                arr[j + 1] = arr[j];
                arr[j] = temp;
                swapped = true;
            }
        }
        if (!swapped) {
            break;
        }
    }
    return arr;
}

// 读取input文件中逗号相隔的数字，并排序
var handleData = async function handleData(filePathForRead, filePathForWrite) {
    var readData = await readFile(filePathForRead);
    //读取数据并转换为数字数组。
    var readDataArr = readData.split(",").map(function (ele) {
        return +ele;
    });
    var data = bubbleSort(readDataArr).join(","); // 冒泡排序
    var output = await writeFile(filePathForWrite, data); // 写入数据
    console.log(output);
};

handleData("./input.txt", "./output.txt");
