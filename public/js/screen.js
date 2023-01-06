
  const body1s = document.getElementById("#body")
  
  if(screen.width < 1023 || screen.height < 790 ){
    body1s.style.display = `none`;
  }
addEventListener("resize", (event) => {

    console.log(event)

    if(screen.width < 1023 ){
        console.log(`Hello width ${screen.width}`)
        body1s.style.display = `none`;
    }
    if( screen.height < 790 ){
        console.log(`Hello height ${screen.height}`)
        body1s.style.display = `none`;
    }
});

