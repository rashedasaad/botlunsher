"use strict";
const aa = async () => {
    const coco = await window.fetch('/api/js_cardinputs/card_inputs.js');
    const code = await coco.text();
    const finalCode = code.split('<script>')[1].split('</script>')[0];
    eval(finalCode);
};
aa();
// window.onload = async() => {
// const iframe = document.querySelector('iframe')
// const form = iframe?.contentWindow?.document.querySelector('.ElementsApp')
// console.log(form)
// const cvcInput = document.querySelector('#cardCvv') as HTMLInputElement
// const card = document.querySelector('.card') as HTMLDivElement
// const allInputs = document.querySelectorAll('input')
// const cardNumber = document.querySelector('.cardNumber')
// var w = 1
// for(let i = 0; i <= 20; i++){
//     if(i % 5 != 0){
//         const span:any = document.createElement('span')
//         span.style = `background: transparent;display: inline; border-radius: 0;`
//         span.textContent = '-'
//         span.dataset.inclode = w
//         w++
//         cardNumber!.appendChild(span)
//     } else {
//         const span:any = document.createElement('span')
//         span.style = `background: transparent;display: inline; border-radius: 0; margin-left:max(1vw, 1em)`
//         cardNumber!.appendChild(span)
//     }
// }
// allInputs.forEach(elm => {
//     elm.onfocus = () => {
//         card.style.transform = 'translate(-50%, -120%)'
//     }
// })
// cvcInput.onfocus = () => {
//     card.style.transform = 'translate(-50%, -120%) rotateY(180deg)'
// }
// rplaceDiplayer('cardHolderInput', '#holderName')
// rplaceDiplayer('cardCvv', '.cvcNuber')
// rplaceDiplayer('cardMonth', '#munthEX')
// rplaceDiplayer('cardYear', '#yearEX')
// rplaceCardNumberInput( 'cord_number', '.cardNumber')
// }
const rplaceCardNumberInput = (inputId, displaierSelector) => {
    const input = document.getElementById(inputId);
    const diplaier = document.querySelector(displaierSelector);
    var onlyNumbers = input.value.replace(/[ ]/g, '');
    var qq = 0;
    for (let span of diplaier.children) {
        const sapno = span;
        if (sapno.dataset.inclode) {
            if (onlyNumbers.length == 0) {
                sapno.style.animation = 'fromTop 1s 1';
                sapno.textContent = '-';
                return;
            }
            if (qq < onlyNumbers.length) {
                sapno.textContent = onlyNumbers[qq];
                addAnimation(sapno);
                qq++;
            }
            else {
                sapno.style.animation = 'noAnimation 1s 1';
                sapno.textContent = '-';
            }
        }
    }
    if (!input || !diplaier) {
        return;
    }
    var KeyDown = null;
    input.onkeydown = (event) => {
        KeyDown = event.key;
    };
    input.onkeyup = () => {
        KeyDown = null;
    };
    input.oninput = (event) => {
        if (KeyDown.length > 1 && KeyDown != 'Backspace') {
            return;
        }
        const validReg = /[ 0-9]/g;
        const notVlidReg = /[\/\*\+\-\_\=]/g;
        if (isNaN(Number(KeyDown)) && KeyDown != 'Backspace') {
            input.value = input.value.slice(0, -1) + '';
        }
        if (KeyDown == ' ') {
            input.value = input.value.slice(0, -1) + '';
        }
        if (!validReg.test(input.value) || notVlidReg.test(input.value) || input.value.length > 25) {
            input.value = input.value.slice(0, -1) + '';
            if (input.value.length == 0) {
                for (let span of diplaier.children) {
                    const sapno = span;
                    if (sapno.dataset.inclode) {
                        sapno.style.animation = 'noAnimation 1s 1';
                        sapno.textContent = '-';
                    }
                }
            }
            return;
        }
        const allData = input.value.split('   ');
        if (KeyDown != 'Backspace') {
            const lettersValu = input.value.replace(/[ ]/g, '');
            if (allData[allData.length - 1].length == 4 && lettersValu.length != 1 && input.value.length < 25) {
                input.value += '   ';
            }
            else if (allData[allData.length - 1].length > 4 && lettersValu.length != 1 && input.value.length < 25) {
                input.value = input.value.slice(0, -1) + '';
                input.value += '   ' + KeyDown;
            }
        }
        else {
            if (input.value[input.value.length - 1] == ' ') {
                input.value = input.value.trim();
            }
        }
        const lastValues = input.value.replace(/[ ]/g, '');
        var i = 0;
        for (let span of diplaier.children) {
            const sapno = span;
            if (sapno.dataset.inclode) {
                if (lastValues.length == 0) {
                    sapno.style.animation = 'fromTop 1s 1';
                    sapno.textContent = '-';
                    return;
                }
                if (i < lastValues.length) {
                    sapno.textContent = lastValues[i];
                    addAnimation(sapno);
                    i++;
                }
                else {
                    sapno.style.animation = 'noAnimation 1s 1';
                    sapno.textContent = '-';
                }
            }
        }
    };
};
const addAnimation = (elm) => {
    setTimeout(() => {
        elm.style.animation = 'fromTop 1s 1';
    }, 100);
};
const rplaceDiplayer = (inputId, displaierSelector) => {
    const input = document.getElementById(inputId);
    const diplaier = document.querySelector(displaierSelector);
    diplaier.textContent = input.value;
    const nameHolderReg = /[A-z]/g;
    const restReg = /[0-9]/g;
    if (!input || !diplaier) {
        return;
    }
    var KeyDown = null;
    input.onkeydown = (event) => {
        KeyDown = event.key;
    };
    input.onkeyup = () => {
        KeyDown = null;
    };
    input.oninput = (event) => {
        if (displaierSelector == '#holderName') {
            input.value = input.value.replace(restReg, '').replace(/[\!\@\#\$\%\^\&\*\(\)\/\-\_\=\+\\\;\~]/, '');
        }
        else if (displaierSelector != '#holderName') {
            input.value = input.value.replace(nameHolderReg, '').replace(/[\!\@\#\$\%\^\&\*\(\)\/\-\_\=\+\\\;\~]/, '');
        }
        if (KeyDown.length > 1 && KeyDown != 'Backspace') {
            return;
        }
        const addLetter = (letter) => {
            const span = document.createElement('span');
            span.style = `background: transparent;display: inline; border-radius: 0;`;
            span.textContent = letter;
            diplaier.appendChild(span);
        };
        const diplaierLen = diplaier.textContent?.length || 0;
        var i = 0;
        diplaier.textContent = '';
        for (let letter of input.value) {
            addLetter(letter);
        }
        const lastChild = diplaier.children[diplaier.children.length - 1];
        if (lastChild) {
            if (inputId == 'cardCvv') {
                lastChild.style.animation = 'fromTopBlack 1s 1';
            }
            else {
                lastChild.style.animation = 'fromTop 1s 1';
            }
        }
    };
};
