
  $.ajaxSetup({
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  function addProduct(order_id,price){
      $totalMoney =  parseInt(document.getElementById('total_result_price').value);

      $.ajax({
         type:'GET',
         url:'/addProduct',
         data:{order_id:order_id},
         success:function(data){
          //  alert(data.quantity);
            var quantityText = document.getElementById('quantity'+order_id);
            $('#cart_total_price_'+order_id ).text( '$'+(data.quantity*price));
            quantityText.value = data.quantity;
            $totalMoney = $totalMoney + price;
            document.getElementById('total_result_price').value=$totalMoney ;
            $('#text_total_result_price').text($totalMoney);
         }
      });
   };
   function subProduct(order_id,row_index,price){
      $totalMoney =  parseInt(document.getElementById('total_result_price').value);
       $.ajax({
          type:'GET',
          url:'/subProduct',
          data:{order_id:order_id},
          success:function(data){
           //  alert(data.quantity);
             if(data.quantity > 0){
               var quantityText = document.getElementById('quantity'+order_id);
               quantityText.value = data.quantity;
               //total_price.text((data.quantity*price)+'$');//(data.quantity*price)+'$';
               $('#cart_total_price_'+order_id ).text( '$'+(data.quantity*price));
               $totalMoney = $totalMoney - price;
               document.getElementById('total_result_price').value=$totalMoney ;
               $('#text_total_result_price').text($totalMoney);
             } else{
               document.getElementById("cart_row_"+row_index).style.display = 'none';
             }
          }
       });
    };

    function addToCart(product_slug){
        $.ajax({
           type:'GET',
           url:'/addToCart',
           data:{product_slug:product_slug},
           success:function(data){
              document.getElementById("cart_alert").style.display = "block";
              $('#msg_cart').text(data.message);
            }
        });
     };
     function exit_alert(){
       document.getElementById("cart_alert").style.display = "none";
     };
     function delProduct(order_id,row_index){
       alert('Are you sure that you want delete this product?');
       $.ajax({
         type:'GET',
         url:'/delProductCart',
         data:{order_id:order_id},
         success:function(data){
           document.getElementById("cart_row_"+row_index).style.display = 'none';
         }
       });
     };
