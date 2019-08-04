 

    var hour = 0;
    var min = 10;
    var sec = 0;
    var iv;
function szamlalo_belso()
{
	//alert('meghivtam a szamlalot')
 iv = setInterval(function ()
    {
        sec--;
        if(sec < 0)
        {
            sec = 59;
            min--;
            if(min < 0)
            {
                
                window.location.assign("{{route('logout')}}");
        
            clearInterval(iv);
            }
        }
        document.getElementById("minutes").innerHTML  = "Kiléptetés :"+min+"-"+sec;

 //
 
 }, 1000);
} 
//*********************************************************
function meglevo_marha(melyik)
{
    //alert('meglevok elotte'+melyik);
   
    
    if(melyik=='meglevo')
     window.location.href="{{route('marha_kepernyore')}}";
     
     if(melyik=='kikerult')
     {
        alert('A kikerultet hivom');
     window.location.href="{{route('kikerult_marha')}}";
     return;   
     }
     //window.location.assign("{{route('marha_kepernyore')}}");
 if(melyik=='elhullott')
     window.location.href="{{route('elhullott_marha')}}";
 if(melyik=='sajat')
     window.location.href="{{route('sajat_vagas_marha')}}";
    
}
//*****************************************************************
function set_kikerules_helyek()
{
    //alert('bejott a kikerules helyekbe');
     text_kikerules=document.getElementById("text_kikerules_helye");
     select_kikerules=document.getElementById("select_eddigi_kikerulesi_helyek");
    if((text_kikerules)&&(select_kikerules))
    {
        //alert('bejott a kikerules helyekbe belsejebe');
        text_kikerules.value=select_kikerules.options[select_kikerules.selectedIndex].text;
    }
    else
    {
        //alert('Objektum hiba a set_kikerulesi helyekben');
    }

}