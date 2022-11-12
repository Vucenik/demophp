import {data1,handler_uredi_button,handler_button_obrisi,insert_post_handler, handler_form_edit,handler_form_delete} from  "./model.js";
import { render_data} from "./view.js";

let data = data1;

//********************setup modals******************//
const modals =document.querySelectorAll(".modal");
for(const modal of modals){
    modal.addEventListener("click",e=>{
        e.target.classList.remove("modal_show");
    })
}


// pokazivanje forme unos sudionika
document.getElementById("gumb_table_dodaj").addEventListener("click",e=>{

   const form =document.getElementById("form_unos_sudionika");
   form.parentElement.classList.add("modal_show");
   form.scrollIntoView({
    behavior:'smooth',block:'end'
 });
    });
    /// gumb na formi klase ukini_modal za ukidanje modala
    document.querySelectorAll(".ukini_modal").forEach(x=>{
        x.addEventListener("click",e=>{
            e.currentTarget.closest(".modal").classList.remove("modal_show");
    
    
        })
    });


////////////////////////////////////////////////////
////////////////update function
const update = ()=>{
    fetch("daj-sve-sudionike")
   // fetch(url_daj_sve)
    .then(x=>{
        if(x.ok===false)throw new Error(x.status);
        return x.json()})
    .then(x=>{
  
        data = [...x.data];
       
     
    })
    .then(x=>render_data(handler_uredi_button,handler_button_obrisi)(data))
    
    .catch(x=>{
        render_data(handler_uredi_button,handler_button_obrisi)(data);
        console.log(x)});
    };// kraj update function





///slanje post forme
    //const gumb_post = document.getElementById("gumb_post");
 document.getElementById("form_unos_sudionika").addEventListener("submit",insert_post_handler(update));
  //  gumb_post.addEventListener('click',insert_post_handler(update));
/// gumb edit post za update
//const gumb_edit_form = document.getElementById("gumb_edit_form");
//gumb_edit_form.addEventListener("click",handler_form_edit(update));
document.getElementById("form_edit_sudionici").addEventListener("submit",handler_form_edit(update));
const gumb_delete_form = document.getElementById("gumb_delete_form");
 gumb_delete_form.addEventListener("click",handler_form_delete(update));



update();


    
    