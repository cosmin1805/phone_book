
var delets = document.getElementsByName('delete')
var multyple = 0
var selected = []
//delete js selection
delets.forEach(element => {
   element.onmousedown=(e)=>{
     if(e.button===1)
     {
        if(selected.includes(element.id)){
            var index = selected.indexOf(element.id);
            if (index !== -1) {
                selected.splice(index, 1);
            }
            multyple--
            element.style.background="white"
            element.innerHTML = ""
        }
        else{
            multyple++
            selected.push(element.id)
            element.style.background="cyan"
            element.innerHTML = "&#10004"
        }
     }
     else if(e.button===0)
     {
        if(confirm("Do you really want to delete this?"))
        {
            document.getElementById('delete:'+element.id).submit()
        }
     }
   }
});

//delete js for multyple elements
document.onmousedown=(e)=>{
    if(multyple!=0)
    {
        if(e.button===2)
        {
            if(confirm("Do you really want to delete this?"))
            {
                document.getElementById('ids').value=selected
                document.getElementById('delete:list').submit()
            }
        }
    }
}

//search bar

function search(){
 var input, filter, table, tr,i, txtValue;

  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table");
  tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {

        var firstname = tr[i].getElementsByTagName("input")[4];
        var lastname = tr[i].getElementsByTagName("input")[5];
        var phonenumber = tr[i].getElementsByTagName("input")[6];

        if(firstname!=undefined&&lastname!=undefined){

            firstname = firstname.value.toLocaleUpperCase();
            lastname = lastname.value.toLocaleUpperCase();
            phonenumber = phonenumber.value;

            var boolArray = search_name(firstname,lastname,phonenumber,filter)

            for(var j=0;j<boolArray.length;j++)
            {
                if(!boolArray[j])
                {
                    tr[i].style.display = "none";
                    break;
                }
                if(j==boolArray.length-1)
                    tr[i].style.display = "";
            }

        }
    }
}

function search_name(firstname,lastname,phonenumber,filter)
{
    var name = firstname + " " + lastname + " " + phonenumber
    var nameArray = name.split(" ")
    var filterArray = filter.split(" ")
    var boolArray =[]

    filterArray.forEach(filter => {
        var found = false;
        nameArray.forEach(name => {
            if(check_name(filter,name))
            {
                found = true;
            }
        });
        boolArray.push(found);
    });

    return boolArray;
}

function check_name(filter,name)
{
    for(var i=0;i<filter.length;i++)
    {
        if(filter[i]!=name[i])
        {
            return false;
        }
    }
    
    return true;
}