window.onload = function(){
  function headerNav(){
    $('footer').css('bottom',0)
  }
  headerNav()

  function Login(){
    $('#Login input[name=username]').val('')
    $('#Login').validate({
      rules:{
        username:{
          required:true
        },
        password:{
          required: true
        }
      },
      messages:{
        username:{
          required: "用户名必填"
        },
        password:{
          required:"密码必填"
        }
      }
    })
  }
  Login()

  function Register(){
    $('#Register>ul>li:has(input)').css({
      'text-align':'left'
    })
    $('#Register').validate({
      rules:{
        username:{
          required:true
        },
        password:{
          required:true,
          rangelength:[6,20]
        },
        confirm_password:{
          equalTo:'#password'
        },
        phone:{
          required:true,
        }
      },
      messages:{
        username:{
          required:"用户名必填"
        },
        password:{
          required:"密码必填",
          rangelength:"密码必须在6到20位之间"
        },
        confirm_password:{
          equalTo:"确认密码必须与密码相同"
        },
        phone:{
          required:"请输入电话号码"
        }
      }
    })
  }
  Register()

  function shoppingCart(){
    var $table = $(".ShoppingCart-container .table");
    // console.log($quantity);
    var number,blur_number;
    $table.delegate('input','focus',function(event){
      event = event || window.event;
      // console.log(event.target);
      number = event.target.value;
      // console.log(number);
    })
    $table.delegate('input','blur',function(event){
      event = event || window.event;
      // 获取书本的名字
      var bookname = $(event.target).parent().prev('li').html();
      // console.log($name);
      blur_number = event.target.value
      // console.log(blur_number);
      if(number != blur_number){
        window.location = "ShoppingCart.php?name="+bookname+"&quantity="+blur_number;
      }
    })
    
    
  }
  shoppingCart()
}