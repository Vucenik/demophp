
// data za prikazivanje
export let data1=[
    // {
    //     "id_sudionici": 1,
    //     "ime": "VLATKO VUČENIK",
    //     "datum": "",
    //     "razred": "1 F"
    // },
    // {
    //     "id_sudionici": 11,
    //     "ime": "VLATKO VUČENIK2",
    //     "datum": "",
    //     "razred": "2 F"
    // },
    // {
    //     "id_sudionici": 14,
    //     "ime": "VLATKO VUČENIK3",
    //     "datum": "",
    //     "razred": "2 F"
    // },
    // {
    //     "id_sudionici": 36,
    //     "ime": "Marko Marković",
    //     "datum": "2022-10-12",
    //     "razred": "1 TR2"
    // },
    // {
    //     "id_sudionici": 38,
    //     "ime": "Mirko Mirković",
    //     "datum": "2022-10-03",
    //     "razred": "1 TR3"
    // },
    // {
    //     "id_sudionici": 39,
    //     "ime": "Mirko Mirkić",
    //     "datum": "2022-10-13",
    //     "razred": "2 tr 2"
    // },
    // {
    //     "id_sudionici": 44,
    //     "ime": "Lik Likić",
    //     "datum": "2022-10-15",
    //     "razred": "2 tr 5"
    // },
    // {
    //     "id_sudionici": 48,
    //     "ime": "Rikić Mikič",
    //     "datum": "2022-10-10",
    //     "razred": "2 tr k"
    // },
    // {
    //     "id_sudionici": 49,
    //     "ime": "",
    //     "datum": "",
    //     "razred": ""
    // },
    // {
    //     "id_sudionici": 50,
    //     "ime": "Proba Probić",
    //     "datum": "2022-10-05",
    //     "razred": "2 tr 2"
    // }
];
   ///// handler button uredi EDIT
export const handler_uredi_button= e=>{
    e.preventDefault();

    const form = document.getElementById("form_edit_sudionici");
    form.parentElement.classList.add("modal_show");

 form.scrollIntoView({
    behavior:'smooth',block:'end'
 });
    const tr_html_kolekcija = e.currentTarget.parentElement.parentElement.children;
  
   form.ime.value=tr_html_kolekcija[0].textContent;
  // console.log(tr_html_kolekcija[1].innerText.trim().split("."));
   const datum_polje = tr_html_kolekcija[1].innerText.trim().split(".");
   const datum = new Date();
//    const dan = Number.parseInt(datum_polje[0]);
//    const mjesec = Number.parseInt(datum_polje[1]);
  // const godina = Number.parseInt(datum_polje[2]);
   const dan = datum_polje[0]?.trim();
   const mjesec = datum_polje[1]?.trim();
   const godina = datum_polje[2]?.trim();
   
  /* datum.setDate(dan);
   datum.setMonth(mjesec);
   datum.setFullYear(godina);*/
   //const date = new Date(tr_html_kolekcija[1].innerText.trim().split(".").slice(0,-1).join("-"));

   form.datum.value=`${godina}-${mjesec}-${dan}`;
   form.razred.value=tr_html_kolekcija[2].innerText;
   const id_sudionici= e.currentTarget.parentElement.parentElement.stanje.id_sudionici;
   
   form.id_sudionici.value=id_sudionici;
   
  

   } /// kraj handler button uredi


    //// handler obrisi 
   
   export const handler_button_obrisi= e=>{
    e.preventDefault();

    const form = document.getElementById("form_delete_sudionici");
    form.parentElement.classList.add("modal_show");
    form.scrollIntoView({
        behavior:'smooth',block:'end'
     });
    const tr_html_kolekcija = e.currentTarget.parentElement.parentElement.children;
   const id_sudionici= e.currentTarget.parentElement.parentElement.stanje.id_sudionici;
   form.id_sudionici.value=id_sudionici;
  
   form.children[2].innerText="Brišem redak: "+tr_html_kolekcija[0].innerText;
 
    }/// kraj handler obrisi

    ///insert post handler FORM = 
    export const insert_post_handler =(update)=>e=>{
       e.preventDefault();
       
         const form = new FormData(e.currentTarget);
         
         
     /*
        for(const [key,value]of form){
            console.log(key,":",value);
        }*/
      //  const datum = new Date(form.get("datum")).getTime();
       // const datum = new Date(form.get("datum")).valueOf();
     //   form.set("datum",datum);
        const url = e.currentTarget.action;
   
        const span =e.currentTarget.querySelector("span.greska");
     
        const reset_forme = form=>()=>form.reset();
        const reset_forma_post = reset_forme(e.currentTarget);
        let response_ok = false;
        let response_status = "";
        fetch(url,{
            body:form,
            method:"POST"
        })
        .then(x=>{
            response_ok = x.ok;
            response_status =x.status;
          
            return x.text()})
        .then(x=>{
            if(response_ok===false)throw new Error(`${ response_status}: ${x}`);

            return x;
            
        }
            )
            .then(x=>{

                span.textContent=x;
                console.log(x);
            })
            .then(x=>reset_forma_post())
            .then(x=> update())
             .catch(x=>{
          
          
            span.textContent=x;
            setTimeout(()=>span.textContent="",3000);
            console.log(x);
        })


    }/// kraj insert post handler
    // ///insert post handler = 
    // export const insert_post_handler =(update)=>e=>{
    //    e.preventDefault();
       
    //      const form = new FormData(e.currentTarget.form);
         
         
    //  /*
    //     for(const [key,value]of form){
    //         console.log(key,":",value);
    //     }*/
    //   //  const datum = new Date(form.get("datum")).getTime();
    //    // const datum = new Date(form.get("datum")).valueOf();
    //  //   form.set("datum",datum);
    //     const url = e.currentTarget.form.action;
   
    //     const span =e.currentTarget.form.querySelector("span.greska");
     
    //     const reset_forme = form=>()=>form.reset();
    //     const reset_forma_post = reset_forme(e.currentTarget.form);
    //     let response_ok = false;
    //     let response_status = "";
    //     fetch(url,{
    //         body:form,
    //         method:"POST"
    //     })
    //     .then(x=>{
    //         response_ok = x.ok;
    //         response_status =x.status;
          
    //         return x.text()})
    //     .then(x=>{
    //         if(response_ok===false)throw new Error(`${ response_status}: ${x}`);

    //         return x;
            
    //     }
    //         )
    //         .then(x=>{

    //             span.textContent=x;
    //             console.log(x);
    //         })
    //         .then(x=>reset_forma_post())
    //         .then(x=> update())
    //          .catch(x=>{
          
          
    //         span.textContent=x;
    //         setTimeout(()=>span.textContent="",3000);
    //         console.log(x);
    //     })


    // }/// kraj insert post form handler

    export const handler_form_edit = (update)=>e=>{
        e.preventDefault();
      
        const form = e.currentTarget;
      
        const forma_za_slanje = new FormData(form);
    
      const  url = form.action;
     
     
     const span = form.querySelector("span");
     fetch(url,{
         body:forma_za_slanje,
         method:"POST"
     })
     .then(x=>{
        if(x.ok===false)throw new Error(x.status);
        return x.text()})
     .then(x=>{
     
    
     span.textContent=x;
     setTimeout(()=>span.textContent="",3000);
         console.log(x);
     return update();
     }
         
         )
     .catch(x=>{
       
        
         span.textContent=x;
         setTimeout(()=>span.textContent="",3000);
         console.log(x);
     })
    
    }
    export const handler_form_delete = (update)=>e=>{
        e.preventDefault();
  
        const form = e.currentTarget.form;
        const forma_za_slanje = new FormData(form);
       
      const  url = form.action;
      const reset_forme = form=>()=>{
          form.parentElement.classList.remove("modal_show");
        form.reset()};
      const reset_forma_delete = reset_forme(form);
     
     const span = form.querySelector("span");
     fetch(url,{
         body:forma_za_slanje,
         method:"POST"
     })
     .then(x=>{
        if(x.ok===false)throw new Error(x.status);
        return x.text()})
     .then(x=>{
     
    
     span.textContent=x;
     setTimeout(()=>span.textContent="",3000);
         console.log(x);
         setTimeout(()=>{
             reset_forma_delete();


         },1000);
     return update();
     }
         
         )
     .catch(x=>{
       
      
         span.textContent=x;
         setTimeout(()=>span.textContent="",3000);
         console.log(x);
     })
    
    }
