
// 判断语法  返回Promise 实例(对象)
function judgeUserReg(user) {
    return new Promise(function (resolve, reject) {
        // 1. 判断长度
        // 2. 首字符
        // 3. 是否含有非法字符
        var lengthReg = /^.{6,12}$/;
        var startReg = /^[^0-9]/;
        var illegalReg = /[^\w$]/;    // 非法字符

        if (lengthReg.test(user)) {
            if (startReg.test(user)) {
                if (!illegalReg.test(user)) {
                    resolve({
                        status: true,
                    });
                } else {

                    // 将  Promise实例(对象)  改为rejected状态  (返回错误信息)
                    var data = {
                        status: false,
                        msg: "用户名由数字,大小写字母,下划线,$组成"
                    }
                    reject(data);
                }
            } else {

                reject({
                    status: false,
                    msg: "用户名不能以数字开头"
                });
            }
        } else {
            reject({
                status: false,
                msg: "用户名需要在 6-12 位之间"
            });
        }
    });


}

// 判断用户名  返回Promise 实例(对象)
function isExistUser(user, u_id) {
    return new Promise(function (resolve, reject) {
        var data = {
            user
        }
        if (u_id) {
            data.u_id = u_id;
        }
        $.ajax({
            type: "get",
            url: "../php/isExistUser.php",
            data: data,
            dataType: "json",
            success(result) {
                // console.log(result);
                if (result.status) {  // 
                    resolve(result);
                } else {
                    reject(result);
                }
            }
        })
    })
}


// function judgeUserHandler(user) {
//     judgeUserReg(user).then(function (result) {
//         // console.log(result);
//         return isExistUser(user);
//     }).then(function (result) {
//         console.log(result)
//     }).catch(function (err) {
//         console.log(err);
//     })
// }

//  将多个Promise 实例  整合后  返回新的 Promise实例
function judgeUserHandler(user, u_id) {
    return new Promise(function (resolve, reject) {  // 返回新的Promise实例
        judgeUserReg(user).then(function (result) {
            if (u_id) {
                return isExistUser(user, u_id);
            } else {
                return isExistUser(user);
            }
        }).then(function (result) {  // 语法和用户名都正确
            resolve(result);
        }).catch(function (err) {  // 语法错误  或者用户名有误
            reject(err);
        })
    })
}


// PWd

async function judgePwdHandler(str) {
    // return new Promise(function (resolve, reject) {
    // })
    // 1. 判断长度
    // 2. 首字符
    // 3. 是否含有非法字符
    var lengthReg = /^.{6,12}$/;
    var illegalReg = /[^\w]/;    // 非法字符
    var isExistNum = /[0-9]/;
    var isExistSmall = /[a-z]/;
    var isExistBig = /[A-Z]/;

    if (lengthReg.test(str)) {
        if (!illegalReg.test(str)) {
            // tipsSpan.textContent = "√";
            // tipsSpan.className = "right";

            var sum = 0;
            if (isExistNum.test(str)) {
                sum++;
            }
            if (isExistSmall.test(str)) {
                sum++;
            }
            if (isExistBig.test(str)) {
                sum++;
            }

            return {
                status: true,
                pwdLevel: sum,
                msg: "√"
            }


        } else {

            throw {
                status: false,
                msg: "密码由数字,大小写字母,下划线,$组成"
            }
        }

    } else {
        throw {
            status: false,
            msg: "密码需要在 6-12 位之间"
        }
    }

}

// repwd
async function judgeRepwdHandler(pwd_1, pwd_2) {
    if (pwd_1 === pwd_2) {
        return {
            status: true,
            msg: "√"
        }
    } else {
        throw {
            status: false,
            msg: "两次密码输入不一致"
        }
    }
}

// phone 格式
async function judgePhoneReg(str) {
    var phoneReg = /^1[3456789]\d{9}$/;
    if (phoneReg.test(str)) {
        return {
            status: true,
            msg: "√"
        }
    } else {
        throw {
            status: false,
            msg: "请输入正确的手机号"
        }
    }
}

function isExistPhone(phone, u_id) {
    return new Promise(function (resolve, reject) {
        var data = {
            phone
        }
        if (u_id) {
            data.u_id = u_id;
        }
        $.ajax({
            type: "get",
            url: "../php/isExistPhone.php",
            data: data,
            dataType: "json",
            success(result) {
                // console.log(result);
                if (result.status) {  // 
                    resolve(result);
                } else {
                    reject(result);
                }
            }
        })
    })
}


/* function judgePhoneHandler(phone, u_id) {
    return new Promise(function (resolve, reject) {
        judgePhoneReg(phone).then(res => {
            if (u_id) {
                return isExistPhone(phone, u_id);
            } else {
                return isExistPhone(phone);
            }
        }).then(res => {
            resolve(res);
        }).catch(res => {
            reject(res);
        })
    })
} */

function judgePhoneHandler(phone, u_id) {
    return judgePhoneReg(phone).then(res => {
        if (u_id) {
            return isExistPhone(phone, u_id);
        } else {
            return isExistPhone(phone);
        }
    }).then(res => {
        return res;
    }).catch(res => {
        // console.log("catch", res);
        return Promise.reject(res);  // 将返回数据 处理为rejected状态
        // return res;
    })
}

// 有点麻烦
// async function judgePhoneHandler(phone, u_id) {
//     var result = await judgePhoneReg(phone);
//     if (result.status) {
//         if (u_id) {
//             return isExistPhone(phone, u_id);
//         } else {
//             return isExistPhone(phone);
//         }

//     } else {
//         throw result;
//     }

// }


// 判断邮箱格式
async function judgeEmailReg(str) {
    //  1272071492@qq.com
    var phoneReg = /^\w{5,12}@\w{2,5}(\.com|\.cn)$/;

    isEmailRight = false;
    if (phoneReg.test(str)) {
        return {
            status: true,
            msg: "√"
        }
    } else {

        throw {
            status: false,
            msg: "请输入正确的邮箱"
        }
    }
}

function isExistEmail(email, u_id) {
    return new Promise(function (resolve, reject) {
        var data = {
            email
        }
        if (u_id) {
            data.u_id = u_id;
        }
        $.ajax({
            type: "get",
            url: "../php/isExistEmail.php",
            data: data,
            dataType: "json",
            success(result) {
                // console.log(result);
                if (result.status) {  // 
                    resolve(result);
                } else {
                    reject(result);
                }
            }
        })
    })
}


function judgeEmailHandler(email, u_id) {
    return judgeEmailReg(email).then(res => {
        if (u_id) {
            return isExistEmail(email, u_id);
        } else {
            return isExistEmail(email);
        }
    }).then(res => {
        return res;
    }).catch(res => {
        return Promise.reject(res);
    })
}

// function judgeEmailHandler(phone, u_id) {
//     return new Promise(function (resolve, reject) {
//         judgeEmailReg(email).then(res => {
//             if (u_id) {
//                 return isExistEmail(email, u_id);
//             } else {
//                 return isExistEmail(email);
//             }
//         }).then(res => {
//             resolve(res);
//         }).catch(res => {
//             reject(res);
//         })
//     })
// }


