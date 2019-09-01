<template>
  <div class="bevitel-dialog">
    <div class="bevitel-fejlec">Marha törzsadat bevitel</div>
    <div class="bevitel-body"><br>
    <form @submit="formSubmit">

        <div class="form-group">
  <div>
  <span class="bevitel-error-szine" v-show="!validations.enarszam.is_valid">{{ validations.enarszam.text }}</span>
</div>
        
            <label for="enarszam" class='col-lg-5 control-label'>Enárszám</label>
            <input type="text" title="Az enárszám pontosan egy tízjegyű szám legyen!"class="'col-lg-4 control-label'" name="enarszam" id="enarszam" v-model="AllatokMarha.enarszam" />
  </div>
        <div class="form-group">

            <div>
  <span class="bevitel-error-szine" v-show="!validations.neve.is_valid">{{ validations.neve.text }}</span>
</div>
            <label for="neve" class='col-lg-5 control-label'>Az állat neve</label>
            <input type="text" title="Ha nem ír be semmmit akkor az enarszamot irjuk be a nevének"class='col-lg-4 control-label' name="neve" id="neve" v-model="AllatokMarha.neve" />
        </div>
     <div class="form-group">
 <div>
  <span class="bevitel-error-szine" v-show="!validations.neme.is_valid">{{ validations.neme.text }}</span>
</div>

            <label for="neme" class='col-lg-5 control-label'>Az állat neme</label>
         
            <select class="custom-select custom-select-sm col-lg-4" v-model="AllatokMarha.neme">
            <option selected value="noivaru">Nőivarú</option>
            <option value="himivaru">Hímivarú</option>
              </select>
        </div>
    <div class="form-group">
 <div>
  <span class="bevitel-error-szine" v-show="!validations.fajta.is_valid">{{ validations.fajta.text }}</span>
</div>

            <label for="fajta" class='col-lg-5 control-label'>Fajta</label>
         
            <select class="custom-select custom-select-sm col-lg-4" v-model="AllatokMarha.fajta">
            <option selected value="magyartarka">Magyartarka</option>
            <option value="limousin">Limousine</option>
            <option value="lapaly">Lapály marha</option>
            <option value="feher_kek">Fehér-kék belga</option>
            <option value="hereford">Hereford</option>
            <option value="hersey">Hersey</option>
            <option value="magyarszurke">Magyar Szürke</option>
            <option value="egyebbhushasznu">Egyébb húshasznú</option>
              </select>
        </div>

   <div class="form-group">
 <div>
  <span class="bevitel-error-szine" v-show="!validations.szine.is_valid">{{ validations.szine.text }}</span>
</div>

            <label for="szine" class='col-lg-5 control-label'>Színe</label>
         
            <select class="custom-select custom-select-sm col-lg-4" v-model="AllatokMarha.szine">
            <option selected value="vorostarka">Vöröstarka</option>
            <option value="feketetarka">Fekete-tarka</option>
            <option value="zsemletarka">Zsemletarka</option>
            <option value="fekete">Egyszínű fekete</option>
            <option value="voros">Egyszínű vörös</option>
            <option value="feketevoros">Fekete-vörös</option>
            <option value="egyebbtarka">Egyébb-tarka</option>
            <option value="egyebb">Egyszínű-egyébb</option>
              </select>
        </div>

    <div class="form-group">
       <div>
  <span class="bevitel-error-szine" v-show="!validations.szuletes_datuma.is_valid">{{ validations.szuletes_datuma.text }}</span>
</div>
            <label for="szuletes_datuma" class='col-lg-5 control-label'>A születés dátuma</label>
            <input type="date" class='col-lg-4 control-label' name="neve" id="szuletes_datuma" v-model="AllatokMarha.szuletes_datuma" />
        </div>

  <div class="form-group">
          <div>
  <span class="bevitel-error-szine" v-show="!validations.bekerult.is_valid">{{ validations.bekerult.text }}</span>
</div> 
            <label for="bekerult" class='col-lg-5 control-label'>Bekerült</label>
            <input type="date" title="A bekerülés dátuma nem lehet kisebb mint a születés dátuma!" class='col-lg-4 control-label' name="bekerult" id="bekerult" v-model="AllatokMarha.bekerult" />
        </div>

   <div class="form-group">
           <div>
  <span class="bevitel-error-szine" v-show="!validations.anya_enarszam.is_valid">{{ validations.anya_enarszam.text }}</span>
</div>
            <label for="anya_enarszam" class='col-lg-5 control-label'>Anya Enárszám</label>
            <input type="text" title="Pontosan egy tízjegyű szám kell hogy legyen!"class="'col-lg-4 control-label'" name="anya_enarszam" id="anya_enarszam" v-model="AllatokMarha.anya_enarszam" />
        </div>
 <div class="form-group">
         <div>
  <span class="bevitel-error-szine" v-show="!validations.anya_neve.is_valid">{{ validations.anya_neve.text }}</span>
</div>
            <label for="anya_neve" class='col-lg-5 control-label'>Anya neve</label>
            <input type="text" title="Ha nem ír be semmit akkor az anya enarszamot fogjuk ide beírni!"class="'col-lg-4 control-label'" name="anya_neve" id="anya_neve" v-model="AllatokMarha.anya_neve" />
        </div>
<div class="form-group">
           <div>
  <span class="bevitel-error-szine" v-show="!validations.jarlat_sorszam.is_valid">{{ validations.jarlat_sorszam.text }}</span>
</div>
            <label for="jarlat_sorszam" class='col-lg-5 control-label'>Járlat sorszáma</label>
            <input type="text" title="Ha még nem kapta meg a járlatot akkor ideiglenesen irjon be valamit!"class="'col-lg-4 control-label'" name="jarlat_sorszam" id="jarlat_sorszam" v-model="AllatokMarha.jarlat_sorszam" />
        </div>

 <div class="form-group">
         <div>
  <span class="bevitel-error-szine" v-show="!validations.jarlat_kiadasa.is_valid">{{ validations.jarlat_kiadasa.text }}</span>
</div>

            <label for="jarlat_kiadasa"  class='col-lg-5 control-label'>Járlat kiadása</label>
            <input type="date" title="Ez nem lehet kisebb mint a bekerülés és vagy a születés dátuma!" class='col-lg-4 control-label' name="jarlat_kiadasa" id="jarlat_kiadasa" v-model="AllatokMarha.jarlat_kiadasa" />
         </div>
<div class="form-group">
         <div>
  <span class="bevitel-error-szine" v-show="!validations.szarmazas_tenyeszet.is_valid">{{ validations.szarmazas_tenyeszet.text }}</span>
</div>

            <label for="szarmazas_tenyeszet" class='col-lg-5 control-label'>Származás tenyészet</label>
            <input type="text" class="'col-lg-4 control-label'" name="szarmazas_tenyeszet" id="szarmazas_tenyeszet" v-model="AllatokMarha.szarmazas_tenyeszet" />
        </div>
        
        <div class="bevitel-nyomogomb">

  <button class="btn btn-success" v-on:click="CancelMarhatorzsBevitel">Cancel</button>
        <button class="btn btn-success">Elküld</button>
        </div>
        <div>                 </div>
    </form>
    <div>
  <span class="bevitel-error-szine" v-show="!validations.eredmeny">Nézze meg a hibaüzeneteket!</span>
  </div>
</div>
                        <strong>Output:</strong>
                        <pre>
                        {{output}}
                        </pre>

    </div>
    </div>
</template>

<script>
export default {

  mounted() {

            console.log('Component mounted.')
        },
  props: ['route','home'],
  data() {
    return {
        AllatokMarha:{
        enarszam: '',
        neve: '',
        neme: 'noivaru',
        szuletes_datuma: this.getdatum(),
        bekerult: this.getdatum(),
        fajta: 'magyartarka',
        szine: 'vorostarka',
        anya_enarszam: '',
        anya_neve: '',
        jarlat_sorszam: '',
        jarlat_kiadasa: this.getdatum(),
        szarmazas_tenyeszet: ''},
         validations: {
           eredmeny: {
        is_valid: true
          },
      enarszam: {
        is_valid: true,
        text: ''
          },
          neve: {
        is_valid: true,
        text: ''
          },
          neme: {
        is_valid: true,
        text: ''
          },
        szuletes_datuma: {
        is_valid: true,
        text: ''
          },
        bekerult: {
        is_valid: true,
        text: ''
          },
        fajta: {
        is_valid: true,
        text: ''
          },
        szine: {
        is_valid: true,
        text: ''
          },
        anya_enarszam: {
        is_valid: true,
        text: ''
          },
        anya_neve: {
        is_valid: true,
        text: ''
          },
        jarlat_sorszam: {
        is_valid: true,
        text: ''
          },
        jarlat_kiadasa: {
        is_valid: true,
        text: ''
          },
        szarmazas_tenyeszet: {
        is_valid: true,
        text: ''
          }

        },
        //--------------------- 
      
         output: ''
        

    }
  },
  methods: {
     CancelMarhatorzsBevitel:function(event)
 {
  //alert('Bejott a cancel clickbe');
   if (event) {
        //alert(event.target.tagName + "Lenyomtad a cancelt Clicked ");
        window.location.href =this.route;
      }

    
 },
    validalasmarha(honnan) {
     // alert('elindult a validatenewCafe');
          //let validNewCafeForm = true;
          let valideredmeny =true;
          this.validations.eredmeny=true;
          if(honnan!='postbol')
            return true;
          //---------------------------------------
            if( this.AllatokMarha.enarszam.trim() == '')
            {
          //validNewCafeForm = false;
          valideredmeny =false;
          this.validations.enarszam.is_valid = false;
          this.validations.enarszam.text = 'Az enarszám nem lehet üres !';
        } 
        else if(!this.AllatokMarha.enarszam.match(/^([0-9]+)$/))
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.enarszam.is_valid = false;
          this.validations.enarszam.text = 'Az enarszám csak szám lehet!';
          //return valideredmeny;
        }
         else if(this.AllatokMarha.enarszam.length!=10)
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.enarszam.is_valid = false;
          this.validations.enarszam.text = 'Az enarszám pontosan 10 jegyű kell legyen!';
        
        }
        else
        {
          this.validations.enarszam.is_valid = true;
          this.validations.enarszam.text = '';
        }
        //-----------------------------------------------------
   if( this.AllatokMarha.neve.trim() == '')
            {
              if(this.validations.enarszam.is_valid==true)
              {
          var modositas =document.getElementById("neve");
          if(modositas)
          {
            modositas.value=this.AllatokMarha.enarszam;
            this.AllatokMarha.neve=this.AllatokMarha.enarszam;
            this.validations.neve.is_valid = true;
          this.validations.neve.text = '';
            //alert('erteket adtam a nevenek');
          }
          //else alert('objectum hiba a nevenel'); 
         }
         } 
         else if(!this.AllatokMarha.neve.match(/^([A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+)$/))
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.neve.is_valid = false;
          this.validations.neve.text = 'A neve nem tartalmazhat különleges elemeket!';
          //return valideredmeny;
        }
        else
        {
                  this.validations.neve.is_valid = true;
                  this.validations.neve.text = '';
        }
        //--------------------------------------------------
                if( this.AllatokMarha.neme.trim() == '')
            {
          //validNewCafeForm = false;
          valideredmeny =false;
          this.validations.neme.is_valid = false;
          this.validations.neme.text = 'A neme nem lehet üres !';
        } 
           else if((this.AllatokMarha.neme!='noivaru')&&(this.AllatokMarha.neme!='himivaru'))
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.neme.is_valid = false;
          this.validations.neme.text = 'A neme nem megfelelő!';
        
        }
        else
        {
          this.validations.neme.is_valid = true;
          this.validations.neme.text = '';
        }

      //--------------------------------------------------
                if( this.AllatokMarha.szuletes_datuma.trim() == '')
            {
          //validNewCafeForm = false;
          valideredmeny =false;
          this.validations.szuletes_datuma.is_valid = false;
          this.validations.szuletes_datuma.text = 'A szuletes dátuma nem lehet üres !';
        } 
           else if(this.AllatokMarha.szuletes_datuma=='1000-01-01')
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.szuletes_datuma.is_valid = false;
          this.validations.szuletes_datuma.text = 'A születés dátumát ki kell jelölnie!';
        
        }
        else
        {
          this.validations.szuletes_datuma.is_valid = true;
          this.validations.szuletes_datuma.text = '';
        }
     //------------------------------------------------------
           if( this.AllatokMarha.bekerult.trim() == '')
            {
          //validNewCafeForm = false;
          valideredmeny =false;
          this.validations.bekerult.is_valid = false;
          this.validations.bekerult.text = 'A bekerülés dátuma nem lehet üres !';
        } 
           else if(this.AllatokMarha.bekerult=='1000-01-01')
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.bekerult.is_valid = false;
          this.validations.bekerult.text = 'A bekerülés dátumát ki kell jelölnie!';
        
        }
        else
        {
          this.validations.bekerult.is_valid = true;
          this.validations.bekerult.text = '';
        }
//------------------------------------------------------------
         if( this.AllatokMarha.anya_enarszam.trim() == '')
            {
          //validNewCafeForm = false;
          valideredmeny =false;
          this.validations.anya_enarszam.is_valid = false;
          this.validations.anya_enarszam.text = 'Az anya enarszám nem lehet üres!';
        } 
        else if(!this.AllatokMarha.anya_enarszam.match(/^([0-9]+)$/))
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.anya_enarszam.is_valid = false;
          this.validations.anya_enarszam.text = 'Az anya enarszám csak szám lehet!';
          //return valideredmeny;
        }
         else if(this.AllatokMarha.anya_enarszam.length!=10)
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.anya_enarszam.is_valid = false;
          this.validations.anya_enarszam.text = 'Az anya_enarszám pontosan 10 jegyű kell legyen!';
        
        }
        else
        {
          this.validations.anya_enarszam.is_valid = true;
          this.validations.anya_enarszam.text = '';
        }

       //-----------------------------------------------------
   if( this.AllatokMarha.anya_neve.trim() == '')
            {
              if(this.validations.anya_enarszam.is_valid==true)
              {
          var modositas =document.getElementById("anya_neve");
          if(modositas)
          {
            modositas.value=this.AllatokMarha.anya_enarszam;
            this.AllatokMarha.anya_neve=this.AllatokMarha.anya_enarszam;
            this.validations.anya_neve.is_valid = true;
          this.validations.anya_neve.text = '';
            //alert('erteket adtam a nevenek');
          }
          //else alert('objectum hiba a nevenel'); 
         }
         } 
         else if(!this.AllatokMarha.anya_neve.match(/^([A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+)$/))
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.anya_neve.is_valid = false;
          this.validations.anya_neve.text = 'Az anya neve nem tartalmazhat különleges elemeket!';
          //return valideredmeny;
        }
        else
        {
                  this.validations.anya_neve.is_valid = true;
                  this.validations.anya_neve.text = '';
        }
//--------------------------------------------------------------
  if( this.AllatokMarha.jarlat_sorszam.trim() == '')
            {
      
            valideredmeny =false;
          this.validations.jarlat_sorszam.is_valid = false;
          this.validations.jarlat_sorszam.text = 'A jarlat sorszam nem lehet üres!';
         } 
         else if(!this.AllatokMarha.jarlat_sorszam.match(/^([A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+)$/))
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.jarlat_sorszam.is_valid = false;
          this.validations.jarlat_sorszam.text = 'A jarlat sorszam nem tartalmazhat különleges elemeket!';
          //return valideredmeny;
        }
        else
        {
                  this.validations.jarlat_sorszam.is_valid = true;
                  this.validations.jarlat_sorszam.text = '';
        }

  //------------------------------------------------------
           if( this.AllatokMarha.jarlat_kiadasa.trim() == '')
            {
          //validNewCafeForm = false;
          valideredmeny =false;
          this.validations.jarlat_kiadasa.is_valid = false;
          this.validations.jarlat_kiadasa.text = 'A jarlat kiadasa dátuma nem lehet üres !';
        } 
           else if(this.AllatokMarha.jarlat_kiadasa=='1000-01-01')
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.jarlat_kiadasa.is_valid = false;
          this.validations.jarlat_kiadasa.text = 'A jarlat kiadasa dátumát ki kell jelölnie!';
        
        }
        else
        {
          this.validations.jarlat_kiadasa.is_valid = true;
          this.validations.jarlat_kiadasa.text = '';
        }

//--------------------------------------------------------------
  if( this.AllatokMarha.szarmazas_tenyeszet.trim() == '')
            {
      
            valideredmeny =false;
          this.validations.szarmazas_tenyeszet.is_valid = false;
          this.validations.szarmazas_tenyeszet.text = 'A szarmazas tenyeszet nem lehet üres!';
         } 
         else if(!this.AllatokMarha.szarmazas_tenyeszet.match(/^([A-ZaáeéiíoóöőuúüűAÁEÉIÍOÓÖŐUÚÜŰa-z0-9_ ]+)$/))
        {
          //validNewCafeForm = false;
          valideredmeny=false;
          this.validations.szarmazas_tenyeszet.is_valid = false;
          this.validations.szarmazas_tenyeszet.text = 'A szarmazas tenyeszet nem tartalmazhat különleges elemeket!';
          //return valideredmeny;
        }
        else
        {
                  this.validations.szarmazas_tenyeszet.is_valid = true;
                  this.validations.szarmazas_tenyeszet.text = '';
        }

        //----------------------------------------------------
         // return validNewCafeForm;
         this.validations.eredmeny=valideredmeny;
        // return true;
        return valideredmeny;
                  } ,
        //------------------------------------------------------          
                  getdatum()
                  {
            //flash('Sikerült az adatbevitel.', 'success');
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();
            //today = mm + '-' + dd + '-' + yyyy;
            today=yyyy+'-'+dd+'-'+mm;
            return today;
                  },
      //-----------------------------------------------------------
      formSubmit(e) {
             // alert('bejott a submitba');
            
                e.preventDefault();
                let currentObj = this;
               //  
               if( this.validalasmarha('postbol') )
               {
               // alert('a post elott');
                axios.post('marha_torzs_create', {
              enarszam: this.AllatokMarha.enarszam,
              neve: this.AllatokMarha.neve,
              neme: this.AllatokMarha.neme,
              szuletes_datuma: this.AllatokMarha.szuletes_datuma,
              bekerult: this.AllatokMarha.bekerult,
              fajta: this.AllatokMarha.fajta,
              szine: this.AllatokMarha.szine,
              anya_enarszam: this.AllatokMarha.anya_enarszam,
              anya_neve: this.AllatokMarha.anya_neve,
              jarlat_sorszam: this.AllatokMarha.jarlat_sorszam,
              jarlat_kiadasa: this.AllatokMarha.jarlat_kiadasa,
              szarmazas_tenyeszet: this.AllatokMarha.szarmazas_tenyeszet
                }) // vege a postnak
                .then(response => {

                    currentObj.output = response.data;
                     if (response.data.error !== 'undefined')
                   
                    if(response.data.error==false)
                    {
                      flash('Sikerült az adatbevitel.', 'success');
                       setTimeout(() =>{
                          window.location.href =this.route;
                        },3000)
                    }
                     if(response.data.error==true)
                    {
                      var oka='Az adatbevitel meghiusult';
                       if (typeof response.data.message !== 'undefined')
                      oka= response.data.message;
                      flash(oka, 'success');
                       setTimeout(() =>{
                          window.location.href =this.home;
                        },3000)
                    }
                       
                     
                    
                
                }).catch ( error => 
    {
      
          console.log(error.response);
  if (error.response.status == 422)
  {
      var SajatErrors = error.response.data.errors;
       //currentObj.output =SajatErrors;

       //----------------------------------------
       if (typeof SajatErrors.enarszam !== 'undefined')
       if(SajatErrors.enarszam[0].length>0)
                  {
      this.validations.enarszam.is_valid = false;
      this.validations.enarszam.text = SajatErrors.enarszam[0]; 
       this.validations.eredmeny=false;
                  }// vege ha enarszam
    if (typeof SajatErrors.neve !== 'undefined')              
 if( SajatErrors.neve[0].length>0)
                  {
                       this.validations.neve.is_valid = false;
    this.validations.neve[0].text =SajatErrors.neve[0];
    this.validations.eredmeny=false; 
                  }// vege ha neve
  if (typeof SajatErrors.neme !== 'undefined')                
 if( SajatErrors.neme[0].length>0)
                  {
                       this.validations.neme.is_valid = false;
          this.validations.neme.text = SajatErrors.neme[0];
          this.validations.eredmeny=false; 
                  }// vege ha neme
if (typeof SajatErrors.szuletes_datuma !== 'undefined')
 if( SajatErrors.szuletes_datuma[0].length>0)
                  {
                       this.validations.szuletes_datuma.is_valid = false;
      this.validations.szuletes_datuma.text = SajatErrors.szuletes_datuma[0]; 
      this.validations.eredmeny=false;
                  }// vege ha szuletes_datuma
if (typeof SajatErrors.bekerult !== 'undefined')
 if( SajatErrors.bekerult[0].length>0)
                  {
                this.validations.bekerult.is_valid = false;
          this.validations.bekerult.text = SajatErrors.bekerult[0]; 
          this.validations.eredmeny=false;
                  }// vege ha bekerult
 if (typeof SajatErrors.fajta !== 'undefined')
 if( SajatErrors.fajta[0].length>0)
                  {
            this.validations.fajta.is_valid = false;
           this.validations.fajta.text = SajatErrors.fajta[0];
           this.validations.eredmeny=false; 
                  }// vege ha fajta
 if (typeof SajatErrors.szine !== 'undefined')
 if( SajatErrors.szine[0].length>0)
                  {
              this.validations.szine.is_valid = false;
            this.validations.szine.text = SajatErrors.szine[0];
            this.validations.eredmeny=false; 
                  }// vege ha szine
if (typeof SajatErrors.anya_enarszam !== 'undefined')
 if( SajatErrors.anya_enarszam[0].length>0)
                  {
                       this.validations.anya_enarszam.is_valid = false;
                      this.validations.anya_enarszam.text = SajatErrors.anya_enarszam[0]; 
                      this.validations.eredmeny=false;
                      }// vege ha anya_enarszam
if (typeof SajatErrors.anya_neve !== 'undefined')
 if( SajatErrors.anya_neve.length>0)
                  {
                       this.validations.anya_neve.is_valid = false;
                      this.validations.anya_neve.text = SajatErrors.anya_neve[0];
                      this.validations.eredmeny=false; 
                  }// vege ha anya_neve
if (typeof SajatErrors.jarlat_sorszam !== 'undefined')
 if( SajatErrors.jarlat_sorszam[0].length>0)
                  {
                       this.validations.jarlat_sorszam.is_valid = false;
                      this.validations.jarlat_sorszam.text = SajatErrors.jarlat_sorszam[0]; 
                      this.validations.eredmeny=false;
                  }// vege ha jarlat_sorszam
if (typeof SajatErrors.jarlat_kiadasa !== 'undefined')
 if( SajatErrors.jarlat_kiadasa[0].length>0)
                  {
                       this.validations.jarlat_kiadasa.is_valid = false;
                      this.validations.jarlat_kiadasa.text = SajatErrors.jarlat_kiadasa[0]; 
                      this.validations.eredmeny=false;
                  }// vege ha jarlat_kiadasa
if (typeof SajatErrors.szarmazas_tenyeszet !== 'undefined')
 if( SajatErrors.szarmazas_tenyeszet[0].length>0)
                  {
                   this.validations.szarmazas_tenyeszet.is_valid = false;
               this.validations.szarmazas_tenyeszet.text = SajatErrors.szarmazas_tenyeszet[0]; 
               this.validations.eredmeny=false;
                  }// vege ha enarszam


       //-----------------------------------------------     
                          //e.target.reset();      
    }// vege ha a response status==422
                      //alert('A visszakapott uzenet:'+this.error);
     
      }); //vege a catcnek 
    
      } // vege a  if( this.validalasmarha('postbol') )         
       
              
              //else alert('a validate false:'+this.validations.enarszam.text );
              
                 //
            }
  },

}
</script>