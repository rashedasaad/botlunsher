
const get = (name) =>{
    return document.getElementById(name)
}


const image = get('image')
const is_the_last_version = get('is_the_last_version')
const isUpdatedButton = get('isUpdatedButton')
const glass = get('glass')
const runScript = get('runScript')
const configrate = get('configrate')
const allNosButtons = document.querySelectorAll('.alert_1 .no')
const update_script = document.querySelector('#update_script')
const configSendr = get('configSendr')
const removClass = async() => {
    glass.style.opacity = '0'
    update_script.style.scale = '0'
    configrate.style.scale = '0'
    await sleep(500)
    glass.style.removeProperty('display')
    update_script.style.removeProperty('display')
    configrate.style.removeProperty('display') 
}
allNosButtons.forEach(button => {
    button.onclick = () => {
        removClass()
    }
})
glass.onclick = async() =>{
    removClass()
}
if(is_the_last_version.textContent == 'false'){
    isUpdatedButton.style.removeProperty('display')
}
isUpdatedButton.onclick = async() =>{
    glass.style.display = 'block'
    update_script.style.display = 'block'
    await sleep(500)
    update_script.style.scale = '1'
    glass.style.opacity = '1'
}
const detales = get('detales')
const allDetales = `${detales.textContent}`
detales.textContent = ''
allDetales.split('\n').forEach(line => {
    const pLine = document.createElement('span')
    pLine.style.display = 'block'
    pLine.textContent = line
    detales.appendChild(pLine)
})
const vid = get('Videos')
const BotName = get('name')
const cost = get('cost')
const wallmsg = get('wallmsg')
const backButton = get('back')
const configDiv = get('configDiv')
var isOpen = false
var allNotFromMain = []
const getIfIndexIsFildOrNot = (index) =>{
    var isSame = false
    Array.from(configDiv.children).forEach(elm => {
        const elmInput = elm.children[1]
        if(elm.dataset.index == index){
            if(elmInput.type == 'checkbox'){
                if(elmInput.checked){
                    isSame = true
                }
            } else {
                if(elmInput.value.length != 0){
                    isSame = true
                }
            }
        }
    })
    return isSame
}
const sendConfig = async() =>{
    const finalArray = []
    var canSend = true
    Array.from(configDiv.children).forEach((input, o) => {
        const finlaValue = {
            index: input.dataset.index,
            isrRequire:null,
            inputType: '',
            content: null,
            inputTitle: '',
            from:NaN,
        }
        if(o == Array.from(configDiv.children).length - 1){
            return
        }
        finlaValue.from = input.dataset.from
        if(input.dataset.ismany != 'true'){
            const elmInput = input.children[1]
            const inputTitle = input.children[0].children[1].textContent.trim('').replace('\n', '')
            finlaValue.inputType = elmInput.tagName.toLocaleLowerCase() == 'textarea' || elmInput.tagName.toLocaleLowerCase() == 'select' ? elmInput.tagName.toLocaleLowerCase() : elmInput.type
            if(input.dataset.from == 0 && elmInput.classList.contains('requireInput')){
                finlaValue.isrRequire = true
                if(elmInput.type == 'checkbox'){
                    if(!elmInput.checked){
                        canSend = false
                    } else {
                        finlaValue.content = true
                        finlaValue.inputTitle = inputTitle
                    }
                } else {
                    if(elmInput.value.length == 0){
                        canSend = false
                    } else {
                        finlaValue.content = elmInput.value
                        finlaValue.inputTitle = inputTitle
                    }
                }
            } else if(input.dataset.from == 0 && elmInput.classList.contains('optionalInput')) {
                finlaValue.isrRequire = false
                if(elmInput.type == 'checkbox'){
                    if(!elmInput.checked){
                        finlaValue.inputTitle = inputTitle
                        finlaValue.content = false
                    } else {
                        finlaValue.content = true
                        finlaValue.inputTitle = inputTitle
                    }
                } else {
                    if(elmInput.value.length == 0){
                        finlaValue.content = null
                        finlaValue.inputTitle = inputTitle
                    } else {
                        finlaValue.content = elmInput.value
                        finlaValue.inputTitle = inputTitle
                    }
                }
            } else if (input.dataset.from != 0 && elmInput.classList.contains('requireInput')){
                finlaValue.isrRequire = true
                if(getIfIndexIsFildOrNot(input.dataset.from)){
                    if(elmInput.type == 'checkbox'){
                        if(!elmInput.checked){
                            canSend = false
                        } else {
                            finlaValue.content = true
                            finlaValue.inputTitle = inputTitle
                        }
                    } else {
                        if(elmInput.value.length == 0){
                            canSend = false
                        } else {
                            finlaValue.content = elmInput.value
                            finlaValue.inputTitle = inputTitle
                        }
                    }
                }
            } else if(input.dataset.from != 0 && elmInput.classList.contains('optionalInput')){
                finlaValue.isrRequire = false
                if(elmInput.type == 'checkbox'){
                    if(!elmInput.checked){
                        finlaValue.content = false
                        finlaValue.inputTitle = inputTitle
                    } else {
                        finlaValue.content = true
                        finlaValue.inputTitle = inputTitle
                    }
                } else {
                    if(elmInput.value.length == 0){
                        finlaValue.content = null
                        finlaValue.inputTitle = inputTitle
                    } else {
                        finlaValue.content = elmInput.value
                        finlaValue.inputTitle = inputTitle
                    }
                }
            }
        } else {
            const allArrays = []
            var isInputTypeAdded = false
            const inputTitle = input.children[0].children[0].children[1].textContent.trim('').replace('\n', '')
            Array.from(input.children).forEach((elm, i) => {
                if(i == Array.from(input.children).length - 1 || i == Array.from(input.children).length - 2){
                    return
                }
                if(!isInputTypeAdded){
                    finlaValue.inputType = elm.children[1].tagName.toLocaleLowerCase() == 'textarea' || elm.children[1].tagName.toLocaleLowerCase() == 'select' ? elm.children[1].tagName.toLocaleLowerCase() : elm.children[1].type
                }
                if(elm.children[1].value.length == 0){
                    canSend = false
                }
                allArrays.push(elm.children[1].value)
            })
            finlaValue.content = allArrays
            finlaValue.inputTitle = inputTitle
            finlaValue.isrRequire = input.children[0].children[0].children[0].textContent.toLowerCase() == 'require *'.toLowerCase() ? true : false
        }
        finalArray.push(finlaValue)
    })
    if(canSend){
        // show_ok_Popap('configuration added')
        glass.style.display = 'block'
        configrate.style.display = 'block'
        await sleep(500)
        configrate.style.scale = '1'
        glass.style.opacity = '1'
        configSendr.value = JSON.stringify({
            botName: BotName.textContent,
            config: finalArray
        })
    } else {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'you need to complete your required fields',
            showConfirmButton: false,
            timer: 3000
        })
    }
}

backButton.onclick = () =>{
    // cfoja.qgwdfouywdq()
}
window.onload = (event) =>{
    // var ides
    // if(data.ides){
    //     ides = [...data.ides]
    // }
    // cost.textContent = data.isFree ? 'Gift' : 'Subscriped'
    // image.src = data.resData.img
    // detales.textContent = data.resData.details
    // vid.src = data.resData.vid
    // BotName.textContent = data.resData.product_name
    // BotName.dataset.p_id =  data.resData.plan_id
    // configDiv.innerHTML = data.htmlConfig
    // const allConfig = document.querySelectorAll('.inputJsonFather')
    Array.from(configDiv.children).forEach((config) => {
        if(config.dataset.from != 0){
            config.style.display = 'none'
            allNotFromMain.push(config)
        }
    })
    Array.from(configDiv.children).forEach((elm, i) => {
        var cloendElement = 0
        const configData = get('config_getter').textContent != 'nothing'?  JSON.parse(get('config_getter').textContent) : get('config_getter').textContent
        if(configData[i]?.content && configData != 'nothing'){
            if(elm.dataset.ismany != 'true'){
                if(configData[i].content == true){
                    elm.children[1].checked = true
                } else {
                    elm.children[1].value = configData[i].content
                }
                // elm.style.display = ''
            } else {
                configData[i].content.reverse().forEach((array, j) => {
                    if(j == 0){
                        elm.children[0].children[1].value = array
                    } else {
                        const clone = elm.children[0].cloneNode(true)
                        clone.children[1].value = array
                        elm.prepend(clone)
                        cloendElement++
                    }
                })
            }
        }
        if(elm.dataset.ismany != 'true'){
            const inputFaild = elm.children[1]
            const indexElem = elm.dataset.index
            if(elm.children[1].type == 'checkbox' || elm.children[1].tagName == 'SELECT'){
                elm.children[1].onchange = () =>{
                    getMissing()
                }
            } else {
                elm.children[1].onkeyup = () =>{
                    getMissing()
                }
            }
            
            const getMissing = () =>{
                    const hide = () => {
                        allNotFromMain.forEach(config => {
                            if(config.dataset.from == indexElem){
                                config.style.display = 'none'
                            }
                        })
                    }
                    const show = () =>{
                        allNotFromMain.forEach(config => {
                            if(config.dataset.from == indexElem){
                                config.style.display = 'block'
                            }
                        })
                    }
                    if(inputFaild.checked  && ((inputFaild.type == 'checkbox' && inputFaild.tagName  == 'INPUT' ))){
                        show()
                    } else if((inputFaild.value != '') && ((inputFaild.type == 'text' && inputFaild.tagName  == 'INPUT') || (inputFaild.tagName == 'SELECT') || (inputFaild.tagName == 'TEXTAREA'))) {
                        show()
                    } else if((inputFaild.value == '') && ((inputFaild.type == 'text' && inputFaild.tagName  == 'INPUT') || (inputFaild.tagName == 'SELECT') || (inputFaild.tagName == 'TEXTAREA'))){
                        hide()
                    } else if ((!inputFaild.checked)  && ((inputFaild.type == 'checkbox' && inputFaild.tagName  == 'INPUT' ))){
                        hide()
                    }
            }
            getMissing()
        } else {
            elm.children[1].onclick = () =>{
                const clone = elm.children[0].cloneNode(true)
                elm.prepend(clone)
                cloendElement++
            }
            elm.children[2].onclick = () =>{
                if(cloendElement != 0){
                    cloendElement--
                    elm.firstChild.remove()
                }
            }
        }
    })
    const allInpits = document.querySelectorAll('input')
    const alltextArea = document.querySelectorAll('textarea')
    const configrateBtn = document.createElement('button')
    configrateBtn.id = 'send'
    configrateBtn.classList.add('configrate')
    configrateBtn.textContent = 'configrate'
    configDiv.appendChild(configrateBtn)
    givFoxAfict(allInpits, 50)
    givFoxAfict(alltextArea, 17)
    const sendFormData = get('send')
    sendFormData.onclick = () =>{
        sendConfig()
    }
    runScript.onclick = (e) => {
        const finalArray = []
        var canSend = true
        Array.from(configDiv.children).forEach((input, o) => {
            const finlaValue = {
                index: input.dataset.index,
                content: null,
                inputTitle: ''
            }
            if(o == Array.from(configDiv.children).length - 1){
                return
            }
            if(input.dataset.ismany != 'true'){
                const elmInput = input.children[1]
                const inputTitle = input.children[0].children[1].textContent.trim('').replace('\n', '')
                if(input.dataset.from == 0 && elmInput.classList.contains('requireInput')){
                    finlaValue.isrRequire = true
                    if(elmInput.type == 'checkbox'){
                        if(!elmInput.checked){
                            canSend = false
                        } else {
                            finlaValue.content = true
                            finlaValue.inputTitle = inputTitle
                        }
                    } else {
                        if(elmInput.value.length == 0){
                            canSend = false
                        } else {
                            finlaValue.content = elmInput.value
                            finlaValue.inputTitle = inputTitle
                        }
                    }
                } else if(input.dataset.from == 0 && elmInput.classList.contains('optionalInput')) {
                    finlaValue.isrRequire = false
                    if(elmInput.type == 'checkbox'){
                        if(!elmInput.checked){
                            finlaValue.inputTitle = inputTitle
                            finlaValue.content = false
                        } else {
                            finlaValue.content = true
                            finlaValue.inputTitle = inputTitle
                        }
                    } else {
                        if(elmInput.value.length == 0){
                            finlaValue.content = null
                            finlaValue.inputTitle = inputTitle
                        } else {
                            finlaValue.content = elmInput.value
                            finlaValue.inputTitle = inputTitle
                        }
                    }
                } else if (input.dataset.from != 0 && elmInput.classList.contains('requireInput')){
                    finlaValue.isrRequire = true
                    if(getIfIndexIsFildOrNot(input.dataset.from)){
                        if(elmInput.type == 'checkbox'){
                            if(!elmInput.checked){
                                canSend = false
                            } else {
                                finlaValue.content = true
                                finlaValue.inputTitle = inputTitle
                            }
                        } else {
                            if(elmInput.value.length == 0){
                                canSend = false
                            } else {
                                finlaValue.content = elmInput.value
                                finlaValue.inputTitle = inputTitle
                            }
                        }
                    }
                } else if(input.dataset.from != 0 && elmInput.classList.contains('optionalInput')){
                    finlaValue.isrRequire = false
                    if(elmInput.type == 'checkbox'){
                        if(!elmInput.checked){
                            finlaValue.content = false
                            finlaValue.inputTitle = inputTitle
                        } else {
                            finlaValue.content = true
                            finlaValue.inputTitle = inputTitle
                        }
                    } else {
                        if(elmInput.value.length == 0){
                            finlaValue.content = null
                            finlaValue.inputTitle = inputTitle
                        } else {
                            finlaValue.content = elmInput.value
                            finlaValue.inputTitle = inputTitle
                        }
                    }
                }
            } else {
                const allArrays = []
                const inputTitle = input.children[0].children[0].children[1].textContent.trim('').replace('\n', '')
                console.log(inputTitle)
                Array.from(input.children).forEach((elm, i) => {
                    if(i == Array.from(input.children).length - 1 || i == Array.from(input.children).length - 2){
                        return
                    }
                    if(elm.children[1].value.length == 0){
                        canSend = false
                    }
                    allArrays.push(elm.children[1].value)
                })
                finlaValue.content = allArrays
                finlaValue.inputTitle = inputTitle
            }
            finalArray.push(finlaValue)
        })
        if(canSend){
            null
        } else {
            e.preventDefault()
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'you need to add your configration first',
                showConfirmButton: false,
                timer: 3000
            })
        }
    }
}

const givFoxAfict = (array, number) =>{
    for(let i = 0; i < array.length; i++){
        if(array[i].type == 'text' || array[i].type == 'password' || array[i].tagName == 'TEXTAREA'){
            if(array[i].value.length != 0){
                array[i].previousElementSibling.children[1].style = `top: ${number}%;translate: 0 -${number}%;color:#FFF;border:solid 1px #ECB365;border-style:none solid none solid `
            }
            array[i].onfocus = () =>{
                array[i].previousElementSibling.children[1].style = `top: ${number}%;translate: 0 -${number}%;color:#FFF;border:solid 1px #ECB365;border-style:none solid none solid `
            }
            array[i].addEventListener('focusout', () => {
                if(array[i].value.length == 0){
                    array[i].previousElementSibling.children[1].style = ''
                }
            })
        }
    }
}

