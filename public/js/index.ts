// const createFillUnput = (inputId:string, displaySlector:string) => {
//     var i = 0
//     const input = document.getElementById(inputId) as HTMLInputElement
//     const displayer = document.querySelector(displaySlector) as HTMLParagraphElement
//     const changeFirstLettr = (word:string, by:string):void => {
//         const replasedWord = word.replace(word[i], by)
//         displayer.textContent = replasedWord
//         i++
//     }
//     const getBakeLetterFirstLettr = (word:string):void => {
//         const replasedWord = word.replace(word[i], '-')
//         displayer.textContent = replasedWord
//         i--
//     }
//     const condetion = (displayer.textContent && i < displayer.textContent!.length + 1)
//     input.onkeyup = (e) =>{
//         if(i >= 0 && condetion){
//             if(e.key == 'Backspace'){
//                 console.log(i)
//                 console.log('delete')
//                 getBakeLetterFirstLettr(displayer.textContent || '')
//                 return
//             }
//         }
//         if(condetion){
//             changeFirstLettr(displayer.textContent || '', input.value[input.value.length - 1])
//         }
//     }
// }
// createFillUnput('cord_number', '#cardNumber1')

const cvcInput = document.querySelector('#cardCvv') as HTMLInputElement
const card = document.querySelector('.card') as HTMLDivElement
const allInputs = document.querySelectorAll('input')
const cardNumber = document.querySelector('.cardNumber')
var w = 1
for(let i = 0; i <= 20; i++){
    if(i % 5 != 0){
        const span:any = document.createElement('span')
        span.style = `background: transparent;display: inline; border-radius: 0;`
        span.textContent = '-'
        span.dataset.inclode = w
        w++
        cardNumber!.appendChild(span)
    } else {
        const span:any = document.createElement('span')
        span.style = `background: transparent;display: inline; border-radius: 0; margin-left:max(1vw, 1em)`
        cardNumber!.appendChild(span)
    }

}
allInputs.forEach(elm => {
    elm.onfocus = () => {
        card.style.transform = 'translate(-50%, -120%)'
    }
})
cvcInput.onfocus = () => {
    card.style.transform = 'translate(-50%, -120%) rotateY(180deg)'
}

const rplaceCardNumberInput = (inputId:string, displaierSelector:string) => {
    const input = document.getElementById(inputId) as HTMLInputElement
    const diplaier = document.querySelector(displaierSelector) as HTMLParagraphElement
    if(!input || !diplaier){
        return
    }
    var KeyDown:string | null = null
    input.onkeydown = (event:KeyboardEvent) => {
        KeyDown = event.key
    }
    input.onkeyup = () => {
        KeyDown = null
    }
    var isSpaceRemove = false
    input.oninput = (event: any) =>{
        if(KeyDown!.length > 1 && KeyDown != 'Backspace'){
            return
        }
        const validReg = /[ 0-9]/g
        const notVlidReg = /[\/\*\+\-\_\=]/g
        if(isNaN(Number(KeyDown)) && KeyDown != 'Backspace'){
            input.value = input.value.slice(0, -1) + ''
        }
        if(KeyDown == ' '){
            input.value = input.value.slice(0, -1) + ''
        }
        if(!validReg.test(input.value) || notVlidReg.test(input.value) || input.value.length > 25){
            input.value = input.value.slice(0, -1) + ''
            if(input.value.length == 0){
                for(let span of diplaier.children){
                    const sapno = span as HTMLSpanElement
                    if(sapno.dataset.inclode){
                        sapno.style.animation = 'noAnimation 1s 1'
                        sapno.textContent = '-'
                    }
                }
            }
            return
        }
        const allData = input.value.split('   ')
        if(KeyDown != 'Backspace'){
            const lettersValu = input.value.replace(/[ ]/g, '')
            if(allData[allData.length - 1].length == 4 && lettersValu.length != 1 && input.value.length < 25){
                input.value += '   '
            } else if(allData[allData.length - 1].length > 4 && lettersValu.length != 1 && input.value.length < 25){
                input.value = input.value.slice(0, -1) + ''
                input.value += '   ' + KeyDown
            }
        } else {
            if(input.value[input.value.length - 1] == ' '){
                input.value = input.value.trim()
            }
        }
        const lastValues = input.value.replace(/[ ]/g, '')
        var i = 0
        for(let span of diplaier.children){
            const sapno = span as HTMLSpanElement
            if(sapno.dataset.inclode){
                if(lastValues.length == 0){
                    sapno.style.animation = 'fromTop 1s 1'
                    sapno.textContent = '-'
                    return
                }
                if(i < lastValues.length){
                    sapno.textContent = lastValues[i]
                    addAnimation(sapno)
                    i++
                } else {
                    sapno.style.animation = 'noAnimation 1s 1'
                    sapno.textContent = '-'
                }
            }
        }
    }
}

const addAnimation = (elm:HTMLElement) => {
    
    setTimeout(() => {
        elm.style.animation =  'fromTop 1s 1'
    }, 100)
    
}

const rplaceDiplayer = (inputId:string, displaierSelector:string) => {
    const input = document.getElementById(inputId) as HTMLInputElement
    const diplaier = document.querySelector(displaierSelector) as HTMLParagraphElement
    diplaier.textContent = input.value
    const nameHolderReg = /[A-z]/g
    const restReg = /[0-9]/g

    if(!input || !diplaier){
        return
    }
    var KeyDown:string | null = null
    input.onkeydown = (event:KeyboardEvent) => {
        KeyDown = event.key
    }
    input.onkeyup = () => {
        KeyDown = null
    }
    input.oninput = (event: any) =>{
        if(displaierSelector == '#holderName'){
            input.value = input.value.replace(restReg, '').replace(/[\!\@\#\$\%\^\&\*\(\)\/\-\_\=\+\\\;\~]/, '')
        } else if(displaierSelector != '#holderName') {
            input.value = input.value.replace(nameHolderReg, '').replace(/[\!\@\#\$\%\^\&\*\(\)\/\-\_\=\+\\\;\~]/, '')
        }
        if(KeyDown!.length > 1 && KeyDown != 'Backspace'){
            return
        }
        const addLetter = (letter:string) => {
            const span:any = document.createElement('span')
            span.style = `background: transparent;display: inline; border-radius: 0;`
            span.textContent = letter
            diplaier.appendChild(span)
        }
        
        const diplaierLen = diplaier.textContent?.length || 0
        var i = 0
        diplaier.textContent = ''
        for(let letter of input.value){
            addLetter(letter)
        }
        const lastChild = diplaier.children[diplaier.children.length - 1] as HTMLSpanElement
        if(lastChild){
            if(inputId == 'cardCvv'){
                lastChild.style.animation =  'fromTopBlack 1s 1'
            } else {
                lastChild.style.animation =  'fromTop 1s 1'
            }
            
        }
        
    }
}


rplaceDiplayer('cardHolderInput', '#holderName')
rplaceDiplayer('cardCvv', '.cvcNuber')
rplaceDiplayer('cardMonth', '#munthEX')
rplaceDiplayer('cardYear', '#yearEX')
rplaceCardNumberInput( 'cord_number', '.cardNumber')
