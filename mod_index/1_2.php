
<html style='overflow:hidden'>
<head>
<style>
body {background:none transparent;margin:0px;padding:0px;
}

.moto-widget-contact_form-group .moto-widget-contact_form-field {
    font-size: 14px;
    padding: 15px 17px;
    line-height: normal;
    outline: none;
    border-width: 0px;
    border-style: solid;
    height: 46px;
    width: 100%;
    color: #666666;
    margin-top: 10px;
    border: solid 1px #ccc;
    margin-bottom:9px;
}
.textHeader {
    background-color: transparent;
    border-bottom-width: 0px;
    border-color: transparent;
    border-left-width: 0px;
    border-radius: 0px;
    border-right-width: 0px;
    border-style: none;
    border-top-width: 0px;
    color: #000000;
    font-family: 'Montserrat', sans-serif;
    font-size: 17px;
    font-style: normal;
    font-weight: 350;
}

</style>

<style>

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
  font-family: 'Montserrat', sans-serif;

}


.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}
</style>

<script>
var inputName = 'urlClaimed';
var ifName = 'urlClaimedIf';

function autocomplete(inp, arr) {
    //console.log(arr);
    var currentFocus;
    inp.addEventListener("click", function(e) {
        document.body.parentNode.style.overflow='auto';
        var a, b, i; 
        //val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        
        currentFocus = -1;
         /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        var bsumheight = 0;
        for (i = 0; i < arr.length; i++) {
                console.log(a);
                
                 /*create a DIV element for each matching element:*/
                /*create a DIV element for each matching element:*/
                b = document.createElement("DIV");
                /*make the matching letters bold:*/
                b.innerHTML = "";
                b.innerHTML += arr[i];
                 /*insert a input field que tiene el valor actual del array:*/
                b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                /*funcion que se ejecuta cuando alguien da click en el item */
                b.addEventListener("click", function(e) {
                    /*insert the value for the autocomplete text field:*/
                    window.parent.document.getElementById("typeif").style.display ='inherit';
                    inp.value = this.getElementsByTagName("input")[0].value;     
                    window.parent.document.getElementById(inputName).value = this.getElementsByTagName("input")[0].value;
                    window.parent.document.getElementById(ifName).scrollIntoView(true);
                                     
                    /*close the list of autocompleted values,
                    (or any other open lists of autocompleted values:*/  
                    closeAllLists();
                    

                });
                /**agrega cada item al array */
                a.appendChild(b);
                bsumheight+=b.offsetHeight;
                

        }

      /*console.log('height:listitems');
      console.log(a.offsetHeight);
      console.log('parentdoc:');*/
      //console.log(window.parent.document.getElementById(ifName));
      console.log(bsumheight);
      if(bsumheight!=0){
          console.log(window.parent.document.getElementById(ifName));
          var tam = bsumheight + 80;
          console.log(tam);
          window.parent.document.getElementById('urlClaimedIf').height =bsumheight; 
      }


    });





 /*execute a function presses a key on the keyboard:*/
 inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
      
  });

  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }


function closeAllLists(elmnt) {
    console.log('closeAllLists');
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
        }
    }
    document.body.parentNode.style.overflow='hidden';
    
    window.parent.document.getElementById(ifName).height = "80"; 

}

/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
  
    if( e.target.id=='urlClaimed'){
    }else{
        closeAllLists(e.target);
    }

}); 

/*execute a function when someone clicks in the document:*/
window.parent.document.addEventListener("click", function (e) {
    if( e.target.id=='urlClaimed'){
    }else{
        closeAllLists(e.target);
    }
}); 
}


</script>

</head>

<body>

<!--<span class="textHeader">Test center <span style='color:#666666 '>*</span></span>-->
<div id="" class="autocomplete emailaddressconfirmation moto-widget-contact_form-group" style="float: unset;">           
    
    <div id="urlClaimed" >country</div>
    <!--<input autocomplete="off" onload='' type="text" class="moto-widget-contact_form-field moto-widget-contact_form-input ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required inputCorrect" style="text-transform:capitalize" value='Country' placeholder="Test center">--> 
</div>
</body>


<script>
var countries = ["Afghanistan","Algeria","Andorra","Angola","Anguilla"];
autocomplete( document.getElementById(inputName),countries);

</script>