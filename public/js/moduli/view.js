
   /////render data 
   export const render_data = (handler_uredi_button=e=>{},handler_button_obrisi=e=>{},table_body = document.querySelector("#ucenici tbody"))=>(data=[])=>{
     ;
  table_body.innerHTML="";
    for(const objekt_redak of data){
    const tr = document.createElement("tr");

    tr.dataset.id_sudionici = objekt_redak.id_sudionici;
    Object.defineProperties(tr,{
        stanje:{
            value:{id_sudionici:objekt_redak.id_sudionici}
        }
    });

    const td_ime = document.createElement("td");
    td_ime.textContent = objekt_redak.ime;    
    tr.appendChild(td_ime);
    const td_datum= document.createElement("td");

    td_datum.textContent =  new Date(objekt_redak.datum).toLocaleDateString();    
  //  td_datum.textContent =  new Date(objekt_redak.datum).toLocaleDateString();    
    tr.appendChild(td_datum);
    const td_razred = document.createElement("td");
    td_razred.textContent = objekt_redak.razred;    
    tr.appendChild(td_razred);
   const  td_uredi = document.createElement("td");
    const bt_uredi = document.createElement("button");
    bt_uredi.classList.add("edit");
    bt_uredi.textContent="Uredi";
    bt_uredi.addEventListener("click",handler_uredi_button);
    td_uredi.appendChild(bt_uredi);
    tr.appendChild(td_uredi);

 const   td_obrisi = document.createElement("td");
 const   bt_obrisi = document.createElement("button");
    bt_obrisi.classList.add("delete");
    bt_obrisi.textContent="Obriši";
    bt_obrisi.addEventListener("click",handler_button_obrisi);
    td_obrisi.appendChild(bt_obrisi);
    tr.appendChild(td_obrisi);





    table_body.appendChild(tr);
  
    };
}; // kraj render function
