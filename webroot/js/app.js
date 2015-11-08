'use strict';

var app = angular.module('PizzaOrderApp', ['ngRoute']);

app.controller('pizzaOrderController', [ '$scope', '$http', function( $scope,$http){
    
    $scope.init = function(){
        
         switch($scope.orderStatus){
        case "0":
            $scope.status = "Approved";
            break;
        case "1":
            $scope.status = "Completed";
            break;
        default:
            break;
        }
    }
       
    
    $scope.Check = function(){
        
        getValue();
        if(!validateData())
        {
            return false;
        }
        
        
    }
    
    $scope.onSubmit = function(){
         getValue();
        if(validateData())
        {
            var newOrder = new PizzaOrder(userName, postalCode, city, province, telNumber, email, size, topping, crustType);
            
                $http({
                     url: "http://localhost:8080/pizzaApp/pizza-orders/add",
                     data: newOrder,
                     transformRequest: function(obj) {
                                                        var str = [];
                                                        for(var p in obj)
                                                        str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
                                                        return str.join("&");
                                                    },
                     method: 'POST',
                     headers: {
                         'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                        }}).success(function (data) {
                            console.log("OK", data)
                            //document.getElementById("message").innerHTML= data;
                         }).error(function (err) {
                            // document.getElementById("message").innerHTML= err;
                            "ERR", console.log(err)});
                        
        }
    }
    
    
    
   var ShowStatus = function(){
      switch($scope.orderStatus){
        case "0":
            $scope.status = "Approved";
            break;
        case "1":
            $scope.status = "Completed";
            break;
        default:
            break;
        }
   }
    
    
}]);

var serverBase = "http://localhost:54301/";

//define all the values 
var userName;
var postalCode;
var city;
var province;
var telNumber;
var email;
var size;
var topping = [];
var crustType;


function PizzaOrder (userName, postalCode, city, province, telephoneNumber, email, pizzaSize, topping, crustType){
    
    this.userName = userName;
    this.postalCode = postalCode;
    this.city = city;
    this.province = province;
    this.telNumber = telephoneNumber;
    this.email = email;
    this.size = pizzaSize;
    this.topping = topping;
    this.crustType = crustType;
    
}

//get all the data from the page
function getValue(){
	
    userName = document.getElementById("customerName").value;
    postalCode = document.getElementById("postalCode").value;
    city = document.getElementById("city").value;
    province = document.getElementById("province").value;
    telNumber = document.getElementById("telephoneNumber").value;
    email = document.getElementById("email").value;
    size = document.getElementById("pizzaSize").value;
    crustType = document.getElementById("crustType").value;
    
    topping = getCheckedBoxes("topping[]");
}


//this is for getting all the checked checkboxes 
function getCheckedBoxes(chkboxName) {
  var topping = "";
  var checkboxes = document.getElementsByName(chkboxName);
  var checkboxesChecked = [];
  // loop over them all
  for (var i=0; i<checkboxes.length; i++) {
     // And stick the checked ones onto an array...
     if (checkboxes[i].checked) {
        checkboxesChecked.push(checkboxes[i].value);
        topping += checkboxes[i].value + ",";
     }
  }
    
/*  if(topping !== "")
  {
      var len = topping.length;
      
      topping = topping.substring(0, len-2);
  }
  return topping;*/
  // Return the array if it is non-empty, or null
  return checkboxesChecked.length > 0 ? checkboxesChecked : null;
}

/*
window.onload =function(){
    
  document.getElementById("submit").onclick = function(){
        getValue();
        if(validateData())
        {
            var newOrder = new PizzaOrder(customerName, postalCode, city, province, telephoneNumber, email, pizzaSize, toppings, crustType);
            
        }
    }
}
*/

function validateData()
{
    //validate the customerName field
    if(isEmpty(userName))
    {
        showErrorMessage("nameError", "please enter your name");
        return false;
    }
    else
    {
         document.getElementById("nameError").classList.add("hidden");
    }
    //validata postal code field
    if(isEmpty(postalCode))
    {
        showErrorMessage("postalCodeError", "Please enter your postal code.");
        return false;
    }
    if(!isPostalCodeValid(postalCode))
    {
         showErrorMessage("postalCodeError", "Please enter a valid canadian postal code(eg. N2C 2H7).");
         return false;
    }
    else
    {
        document.getElementById("postalCodeError").classList.add("hidden");
    }
    //validate the province field
    if(isEmpty(province))
    {
         showErrorMessage("provinceError", "Please select a province");
         return false;
    }
    else
    {
        document.getElementById("provinceError").classList.add("hidden");
    }
    //validate city field
    if(isEmpty(city))
    {
        showErrorMessage("cityError", "Please enter the name of your city");
        return false;
    }
    else
    {
        removeErrorMessage("cityError");
    }
    //validate email 
    if(isEmpty(email))
    {
        showErrorMessage("emailError", "Please enter your email address");
        return false;
    }
    if(!isEmailAddressValid(email))
    {
        showErrorMessage("emailError", "Please enter a valid email address");
        return false;
    }
    else
    {
        removeErrorMessage("emailError");
    }
     //validate telephone number field
    if(isEmpty(telNumber))
    {
        showErrorMessage("telephoneNumberError", "Please enter your telephone number");
        return false;
    }
    if(!isPhoneNumberValid(telNumber))
    {
        showErrorMessage("telephoneNumberError", "Please enter a 10-digit valid telephone number.");
        return false;
    }
    else
    {
        removeErrorMessage("telephoneNumberError");
    }
    
    //validate the pizzaSize field
    if(isEmpty(size))
    {
        showErrorMessage("pizzaSizeError", "Please select the pizza size.");
        return false;
    }
    else
    {
        removeErrorMessage("pizzaSizeError");
    }
    //validate the pizzaToppings filed    
    if(topping == null)
    {
        showErrorMessage("toppingsError", "Please select at least one topping you like.");
        return false;
    }
    else
    {
        removeErrorMessage("toppingsError");
    }
    if(isEmpty(crustType))
    {
        showErrorMessage("crustTypeError", "Please select a crust type you like.")
        return false;
    }
    else
    {
        removeErrorMessage("crustTypeError")
    }
    
    return true;
}


function showErrorMessage(elementId, message){
     document.getElementById(elementId).classList.remove("hidden");
     document.getElementById(elementId).innerHTML= message;
     document.getElementById(elementId).classList.add("alert-danger");
}


function removeErrorMessage(elementId)
{
    document.getElementById(elementId).classList.add("hidden");
}


 $(document).ready(function() {
    $('#submitBtn').click(function() {
            //option A
             getValue();
            if(!validateData())
            {
                $("form").submit(function(e){
                        
                        e.preventDefault(e);
                });
            }
 });
     
  var elementExists = document.getElementById("editToppings");
  if(elementExists){
      
      var toppings = document.getElementById("editToppings").innerHTML;
      
      var toppingArray = toppings.split(",");
      
      if(toppingArray.length > 0){
          
          for(var i = 0; i < toppingArray.length; i++)
          {
            document.getElementById(toppingArray[i]).setAttribute("checked", "true");
          }
      }
  }
     
     
     var isOrderTableExists = document.getElementById("orderTable_ordered");
     if(isOrderTableExists){
         
              //skip the header
         var firstItem = 1;

         var orderedItemsCount = document.getElementById("orderTable_ordered").rows.length;

         //get the initial first row's id in the table
         var id = document.getElementById("orderTable_ordered").rows[1].getAttribute("id");

         for(var startPos = firstItem + 10; startPos < orderedItemsCount; startPos++)
         {
             document.getElementById("orderTable_ordered").rows[startPos].style.display = 'none'; 
         }

         $('#back_ordered').click(function(){

             if(firstItem == 1){
                 return false;
             }
             else
             {
                for(var startPos = 1; startPos < orderedItemsCount; startPos++)
                {
                     document.getElementById("orderTable_ordered").rows[startPos].style.display = 'none'; 
                }
                var startPos = firstItem - 10;
                for(var i = startPos; i < startPos+10; i++)
                {
                     document.getElementById("orderTable_ordered").rows[i].style.display = 'table-row'; 
                } 

                firstItem -= 10;
             }

             var id = document.getElementById("orderTable_ordered").rows[0];


         });

         $("#forward_ordered").click(function(){
            if(orderedItemsCount - firstItem < 10 ){
                return false;
            }
            else
            {
                for(var startPos = 1; startPos < orderedItemsCount; startPos++)
                {
                     document.getElementById("orderTable_ordered").rows[startPos].style.display = 'none'; 
                }
                var startPos = firstItem + 10;
                 for(var i = startPos; i < startPos+10; i++)
                {
                     document.getElementById("orderTable_ordered").rows[i].style.display = 'table-row'; 
                }

                firstItem += 10;
            }
         });
         
     }
     
    
        var isCompletedTableExists = document.getElementById("orderTable_completed");
     if(isCompletedTableExists){
         
              //skip the header
         var firstItem = 1;

         var completedItemsCount = document.getElementById("orderTable_completed").rows.length;

         //get the initial first row's id in the table
         var id = document.getElementById("orderTable_completed").rows[1].getAttribute("id");

         for(var startPos = firstItem + 10; startPos < completedItemsCount; startPos++)
         {
             document.getElementById("orderTable_completed").rows[startPos].style.display = 'none'; 
         }

         $('#back_completed').click(function(){

             if(firstItem == 1){
                 return false;
             }
             else
             {
                for(var startPos = 1; startPos < completedItemsCount; startPos++)
                {
                     document.getElementById("orderTable_completed").rows[startPos].style.display = 'none'; 
                }
                var startPos = firstItem - 10;
                for(var i = startPos; i < startPos+10; i++)
                {
                     document.getElementById("orderTable_completed").rows[i].style.display = 'table-row'; 
                } 

                firstItem -= 10;
             }

             var id = document.getElementById("orderTable_completed").rows[0];


         });

         $("#forward_completed").click(function(){
            if(completedItemsCount - firstItem < 10 ){
                return false;
            }
            else
            {
                for(var startPos = 1; startPos < completedItemsCount; startPos++)
                {
                     document.getElementById("orderTable_completed").rows[startPos].style.display = 'none'; 
                }
                var startPos = firstItem + 10;
                
                
                for(var i = startPos; i < (completedItemsCount - (startPos+10) > 0 ? startPos+10 : completedItemsCount); i++)
                {
                     document.getElementById("orderTable_completed").rows[i].style.display = 'table-row'; 
                }

                firstItem += 10;
            }
         });
         
     }
     
});




