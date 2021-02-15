<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript" src="city.js"></script> 
<!-- UIkit JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.1.6/js/uikit-icons.min.js"></script>
<script src="ddj-3.3.1.min.js"></script>
<script src="ddtwin.min.js"></script>
<script src="menu_custom.js"></script>
 <script type="text/javascript">






function add(id)
{
  var txtNumber = document.getElementById(id);
  var newNumber = parseInt(txtNumber.value) + 1;
  txtNumber.value = newNumber;
    $.ajax({
            url: "duplicate_product_reg.php",
            type: "POST",
            data: { 'product_id': id, 'qty': 'yes','quantity': newNumber },                   
            success: function()
                        {
                                                                
                        }
        });

}
function subtract(id)
{
  var txtNumber = document.getElementById(id);
  var newNumber = parseInt(txtNumber.value) - 1;
  txtNumber.value = newNumber;
             $.ajax({
            url: "duplicate_product_reg.php",
            type: "POST",
            data: { 'product_id': id, 'qty': 'yes','quantity': newNumber },                   
            success: function()
                        {
                                                                
                        }
        });
}

function manual(id)
{

  var txtNumber = document.getElementById(id);

             $.ajax({
            url: "duplicate_product_reg.php",
            type: "POST",
            data: { 'product_id': id, 'qty': 'yes' },                   
            success: function()
                        {
                                                                
                        }
        });

}

function merchant_docu(id)
{

  var txtNumber = document.getElementById(id);
             $.ajax({
            url: "merchant_remove.php",
            type: "POST",
            data: { 'product_id': id,'dd':'yes'},                   
            success: function()
                        {
                                                                
                        }
        });

}

function delete_image(id,go,msg)
{

             const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({

  text: msg,
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes',
  cancelButtonText: 'No ',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
       var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
    {
       
     $.ajax({
            url: go,
            type: "POST",
            data: { 'product_id': id},                   
            success: function()
                        {
                                                                
                        }
        });
    }
     };
    xmlhttp.open("GET", go, true);
     xmlhttp.send();
  }

})

}

  
  $(document).on('click','.show_more',function()
  {
        var ID = $(this).attr('id');
        $('.show_more').hide();
        $('.loding').show();
          $.ajax({
            type:'POST',
            url:'load_more.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.c_product_grid_details').append(html);
            }
        });

  });

  $(document).on('click','.show_more_shop',function()
  {
        var ID = $(this).attr('id');
        $('.show_more_shop').hide();
        $('.loding').show();
          $.ajax({
            type:'POST',
            url:'show_more.php',
            data:'id='+ID,
            success:function(html){
                $('#show_more_main'+ID).remove();
                $('.c_product_grid_details').append(html);
            }
        });

  });

  
  
  function confirmation(id,go,goto)
  {
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes      ',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
       var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
    {
        
    ajaxpagefetcher(id,goto, true);
    }
     };
    xmlhttp.open("GET", go, true);
     xmlhttp.send();
  }

})
    }

    function approveIt(id,go,goto)
  {
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({

  text: "Are you sure you want to approve this request?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, approve! ',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
       var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
    {
     
 
    ajaxpagefetcher.load(id,goto, true);
    }
     };
    xmlhttp.open("GET", go, true);
     xmlhttp.send();
  }

})
    }

     function cancelIt(id,go,goto)
  {
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({

  text: "Are you sure you want to reject this request?",
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes',
  cancelButtonText: 'No ',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
       var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
    {
       
    ajaxpagefetcher.load(id,goto, true);
    }
     };
    xmlhttp.open("GET", go, true);
     xmlhttp.send();
  }

})
    }

     function rejectIt(id,go,goto,msg)
  {
const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false,
})

swalWithBootstrapButtons.fire({

  text: msg,
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes',
  cancelButtonText: 'No ',
  reverseButtons: true
}).then((result) => {
  if (result.value) {
       var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
    {
       
    ajaxpagefetcher.load(id,goto, true);
    }
     };
    xmlhttp.open("GET", go, true);
     xmlhttp.send();
  }

})
    }




   function upload_image_deo(name,target,thengoto,deo)
     {
        var form = document.forms.namedItem(name);
        form.addEventListener('submit', function(ev) {

          oData = new FormData(form);

          oData.append("CustomField", "This is some extra data");

          var oReq = new XMLHttpRequest();
          oReq.open("POST", target, true);
          oReq.onload = function(oEvent) {
            if (oReq.status == 200) {      
              ShowInfo(oReq.responseText);
              if(oReq.responseText=="success"){
                  ajaxpagefetcher.load(deo,thengoto,true);
              }
          } else {
              ShowInfo("Error " + oReq.status + " occurred when trying to upload your file.");
              hidden.style.display = "block";
          }
      };

      oReq.send(oData);
      ev.preventDefault();
  }, false);
  }

    function hide_deo(id){
    var x = document.getElementById(id);
//x.style.display = "none";
x.innerHTML = "Upload Done";
hidden = x;
ShowInfo("Upload Done");
}

function populate(s1,s2)
{
 var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    console.log(s1.value);
    s2.innerHTML = "";
      if(s1.value == "Electronic Devices"){
        var optionArray = ["|","Android Phones|Android Phones","iPhone|iPhone","Tablets|Tablets","Computers|Computers","Audio|Audio","Computer Parts|Computer Parts","Others|Others"];

    }
     else if(s1.value == "Electronic Accessoriest"){
        var optionArray = ["|","Case|Case","Power Banks|Power Banks","Chargers|Chargers","Others|Others"];

    }

    else if(s1.value == "TV & Home Appliances"){
        var optionArray = ["|","Tv|Tv","Furniture|Furniture","Kitchen Appliances|Kitchen Appliances","Others|Others"];

    }
    else if(s1.value == "Health & Beauty"){
        var optionArray = ["|","Skin care|Skin care","Make-up|Make-up","Hair Care|Hair Care","Men Grooming|Men Grooming","Perfumes Nail care|Perfumes,Nail care","Others|Others"];

    }
     else if(s1.value == "Babies & Toys"){
        var optionArray = ["|","Stroller Bags and Carriers|Stroller Bags and Carriers","Board Games and Cards|Board Games and Cards","Others|Others"];

    }
      else if(s1.value == "Groceries & Pets"){
        var optionArray = ["|","Pet Accessories|Pet Accessories","Pet Food|Pet Food","Others|Others"];

    }

    else if(s1.value == "Womens Fashion"){
        var optionArray = ["|","Bags and wallets|Bags and wallets","Footwear|Footwear","Clothes|Clothes","Accessories|Accessories","Watches|Watches","Jewelry|Jewelry","Others|Others"];

    }
      else if(s1.value == "Mens Fashion")
    {
        var optionArray = ["|","Bags and wallets|Bags and wallets","Footwear|Footwear","Clothes|Clothes","Accessories|Accessories","Watches|Watches","Others|Others"];

    }
    else if(s1.value == "Fashion Accessories")
    {
        var optionArray = ["|","Womens Watches|Womens Watches","Mens Watches|Mens Watches","Kid Watches|Kid Watches","Mens Jewelry|Men Jewelry","Womens Jewelry|Womens Jewelry","Sunglasses|Sunglasses","Eyelasses|Eyelasses","Eyewear Accessories|Eyewear Accessories","Contact Lens|Contact Lens","Others|Others"];

    }
        else if(s1.value == "Food")
    {
        var optionArray = ["|","Vegetables|Vegetables","Fruits|Fruits","Meat|Meat","Can goods |Can goods","Chicken|Chicken","Fish|Fish","Others|Others"];

    }
        else if(s1.value == "Poltry supply")
    {
        var optionArray = ["|","Accessories|Accessories","Grains Feeds and Ingredients|Grains Feeds and Ingredients","Medicine|Medicine","Others|Others"];

    }

         else if(s1.value == "School supply")
    {
        var optionArray = ["|","Notebooks|Notebooks","Folders|Folders","Pencil sharpener|Pencil sharpener","Bag|Bag","Pencil|Pencil","Others|Others"];

    }
     else if(s1.value == "Livestock")
    {
        var optionArray = ["|","Notebooks|Notebooks","Folders|Folders","Pencil sharpener|Pencil sharpener","Bag|Bag","Pencil|Pencil","Others|Others"];

    }
         else if(s1.value == "Hardware")
    {
        var optionArray = ["|","Angles Braces and Brackets|Angles Braces and Brackets","Cabinet and Furniture Hardware|Cabinet and Furniture Hardware","Chain and Rope|Chain and Rope","Door Hardware|Door Hardware","Door Knobs and Locks|Door Knobs and Locks","Fire Safety|Fire Safety","Garage Door Openers and Hardware|Garage Door Openers and Hardware","Hanging and Mounting|Hanging and Mounting","Hooks and Screw Eyes|Hooks and Screw Eyes","Keys and Accessories|Keys and Accessories","Mailboxes and Posts|Mailboxes Anchorsd Posts","Safety and Security|Safety and Security","Screws and Anchors|Screws and Anchors","Others|Others","Others|Others","Others|Others"];

    }
     else if(s1.value == "Sports & Travel")
    {
      

    }



     for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
    document.getElementById("audio_type").style.display='none';
        document.getElementById("audio_brand").style.display='none';
        document.getElementById("audio_special").style.display='none';
      document.getElementById("android_brand").style.display='none';
      document.getElementById("android_model").style.display='none';
      document.getElementById("android_storage").style.display='none';
      document.getElementById("iphone_model").style.display='none';
      document.getElementById("iphone_storage").style.display='none';
      document.getElementById("iphone_color").style.display='none';
      document.getElementById("tablet_model").style.display='none';
      document.getElementById("tablet_storage").style.display='none';

      document.getElementById("computer_type").style.display='none';
      document.getElementById("computer_ram").style.display='none';
      document.getElementById("computer_sdd").style.display='none';
      document.getElementById("computer_hdd").style.display='none';
    

}

function checkvalue(s2)
{
  
      console.log(s2);

    
      if(s2=="Bag and wallet")
     {
      document.getElementById("deo_color").style.display='none';
      document.getElementById("deo_size").style.display='none';
       

     }
      else if(s2=="Accessories")
     {
      document.getElementById("deo_color").style.display='none';
      document.getElementById("deo_size").style.display='none';
       

     }
     else if(s2=="Watches")
     {
      document.getElementById("deo_color").style.display='none';
      document.getElementById("deo_size").style.display='none';
     }
     else
     {
      document.getElementById("deo_color").style.display='block';
      document.getElementById("deo_size").style.display='block';
     }

     
}


function cat(s1,s2)
{
   var s1 = document.getElementById(s1);
    var s2 = document.getElementById(s2);
    s2.innerHTML = "";
    console.log(s1);
    if(s1.value == "Electronic Devices"){
        var optionArray = ["|","iPhone|iPhone","Android Phones|Android Phones","Tablets|Tablets","Computers|Computers","Audio|Audio","Computer Parts|Computer Parts","Others|Others"];
               document.getElementById('slct2').style.display='block';
               document.getElementById("p1").innerHTML = s1.value ;

    }
    else if(s1.value == "Electronic Accessoriest"){
        var optionArray = ["|","Case|Case","Power Banks|Power Banks","Chargers|Chargers","Others|Others"];
               document.getElementById('slct2').style.display='block';

    }

    else if(s1.value == "TV & Home Appliances"){
        var optionArray = ["|","Tv|Tv","Furniture|Furniture","Kitchen Appliances|Kitchen Appliances","Others|Others"];
                             document.getElementById('slct2').style.display='block';

    }
    else if(s1.value == "Health & Beauty"){
        var optionArray = ["|","Skin,Bath and Body|Skin Bath and Body","Make-up|Make-up","Hair Care|Hair Care","Men Grooming|Men Grooming","Perfumes Nail care|Perfumes,Nail care","Others|Others"];
                             document.getElementById('slct2').style.display='block';

    }
     else if(s1.value == "Babies & Toys"){
        var optionArray = ["|","Stroller Bags and Carriers|Stroller Bags and Carriers","Board Games and Cards|Board Games and Cards","Others|Others"];
                             document.getElementById('slct2').style.display='block';

    }
      else if(s1.value == "Groceries & Pets"){
        var optionArray = ["|","Pet Accessories|Pet Accessories","Pet Food|Pet Food","Others|Others"];
                             document.getElementById('slct2').style.display='block';

    }

    else if(s1.value == "Womens Fashion"){
        var optionArray = ["|","Bags and wallets|Bags and wallets","Footwear|Footwear","Clothes|Clothes","Accessories|Accessories","Watches|Watches","Jewelry|Jewelry","Others|Others"];
                             document.getElementById('slct2').style.display='block';

    }
      else if(s1.value == "Mens Fashion")
    {
        var optionArray = ["|","Bags and wallets|Bags and wallets","Footwear|Footwear","Clothes|Clothes","Accessories|Accessories","Watches|Watches","Others|Others"];
                             document.getElementById('slct2').style.display='block';

    }
        else if(s1.value == "Food")
    {
        var optionArray = ["|","Vegetables|Vegetables","Fruits|Fruits","Meat|Meat","Can goods |Can goods","Chicken|Chicken","Fish|Fish","Others|Others"];
                             document.getElementById('slct2').style.display='block';

    }
        else if(s1.value == "Poltry supply")
    {
        var optionArray = ["|","Accessories|Accessories","Grains,Feeds and Ingredients|Grains, Feeds and Ingredients","Medicine|Medicine","Others|Others"];
                             document.getElementById('slct2').style.display='block';

    }

         else if(s1.value == "School supply")
    {
        var optionArray = ["|","Notebooks|Notebooks","Folders|Folders","Pencil sharpener|Pencil sharpener","Bag|Bag","Pencil|Pencil","Others|Others"];
                     document.getElementById('slct2').style.display='block';

    }
     else if(s1.value == "Livestock")
    {
        var optionArray = ["|","Notebooks|Notebooks","Folders|Folders","Pencil sharpener|Pencil sharpener","Bag|Bag","Pencil|Pencil","Others|Others"];
                     document.getElementById('slct2').style.display='block';

    }
         else if(s1.value == "Hardware")
    {
        var optionArray = ["|","Angles, Braces and Brackets|Angles, Braces and Brackets","Cabinet and Furniture Hardware|Cabinet and Furniture Hardware","Chain and Rope|Chain and Rope","Door Hardware|Door Hardware","Door Knobs and Locks|Door Knobs and Locks","Fire Safety|Fire Safety","Garage Door Openers and Hardware|Garage Door Openers and Hardware","Hanging and Mounting|Hanging and Mounting","Hooks and Screw Eyes|Hooks and Screw Eyes","Keys and Accessories|Keys and Accessories","Mailboxes and Posts|Mailboxes and Posts","Safety and Security|Safety and Security","Screws and Anchors|Screws and Anchors","Others|Others","Others|Others","Others|Others"];
             document.getElementById('slct2').style.display='none';

    }



    for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
    }
     document.getElementById('strg').style.display='none';
     document.getElementById('sz').style.display='none';
     document.getElementById('tp').style.display='none';
     document.getElementById('f1').style.display='none';
     document.getElementById('f2').style.display='none';
     document.getElementById('clr').style.display='none';
     document.getElementById('phone').style.display='none';
     document.getElementById('tabs').style.display='none';
     document.getElementById('comp').style.display='none';
     document.getElementById('aud').style.display='none';
     document.getElementById('com_parts').style.display='none';
     document.getElementById('cse').style.display='none';
     document.getElementById('tv').style.display='none';
     document.getElementById('firni').style.display='none';
    document.getElementById('firni1').style.display='none';
   document.getElementById('tv').style.display='none';
       document.getElementById('tv1').style.display='none';
       document.getElementById('tv2').style.display='none';
}





  function deliver(id)
  {
            if(id==="Meet")
                 {
document.getElementById('add').style.display='none';
document.getElementById('meet').style.display='block';

                 }
                 else if (id==="Delivery")
                  {
document.getElementById('add').style.display='block';
document.getElementById('meet').style.display='none';
                  }
                  else if (id==="both")
                  {
document.getElementById('add').style.display='block';
document.getElementById('meet').style.display='block';
                  }
  }

     


</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/statecity.js"></script>