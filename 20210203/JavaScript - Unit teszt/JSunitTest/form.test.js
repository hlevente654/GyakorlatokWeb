const { test, expect } = require('@jest/globals')
const checkJelszo=require('./form')
//const checkCard=require('./form')

test("jelszó hossz ellenőrzése",()=>{
    let arr=checkJelszo('123')
    let hossz=arr.length
    expect(hossz).toBe(1)
});

test("jelszó tartalmaze számot ",()=>{
    let arr=checkJelszo('ffjkjkkjkk1jkhjkhj')
    let hossz=arr.length
    expect(hossz).toBe(0)
});

/*test("a bankkartya ellenőrzése",()=>{
    let flag=checkCard([1234,5555,5554,6666])
    expect(flag).toBe(false)
});*/