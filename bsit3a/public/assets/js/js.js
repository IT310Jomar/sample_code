$(document).ready(function(){

    $('#employeeTable').DataTable({
        paging: true,
        searching: true,
        ordering: true,
        responsive: true
    });
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "timeOut": "3000", 
    };

    const cacheKey = "cachedEmployeeData";
    const cacheExpiration = 5 * 60 * 1000; // 5 minutes in milliseconds
    const storedData = localStorage.getItem(cacheKey);
    const storedTime = localStorage.getItem(cacheKey + "_time");

   
    // function renderTable(employee) {
    //     var body = $('#employeeTableBody');
    //     body.empty();

    //     $.each(employee, function(index, item) {
    //         body.append(`<tr>
    //             <td>${item.user.name}</td>
    //             <td>${item.user.email}</td>
    //             <td>${item.locations.country.name}</td>
    //         </tr>`);
    //     });
    // }

   
    // if (storedData && storedTime && (Date.now() - storedTime < cacheExpiration)) {
    //     console.log("Using Cached Data");
    //     renderTable(JSON.parse(storedData));
    // } else {
    //     console.log("Fetching from API...");
       
    // }
    
    // $.ajax({
    //     url: '/api/auth/employee',
    //     type: 'GET',
    //     success: function(response){
    //         console.log(response)
    //     },
    //     error: function(xhr,status){
    //         console.error(xhr.responseText)
    //     }
    
    // });
    
    // axios.get("/api/auth/employee")
    //   .then(function(response){
    //     if(response.data.success){
    //         var body = $('#employeeTableBody');
    //         var employee = response.data.employee
    //         console.log(employee)
    //         body.empty();
    
    //         // for(var e = 0; e < employee.length;e++){
    //         //    body.append(`<tr>
    //         //       <td>${employee[e].user.name}</td>
    //         //      <td>${employee[e].user.email}</td>
    //         //      <td>${employee[e].locations.country.name}</td>
    //         //     </tr>`)
    //         // }
    
    //         employee.forEach(function(item){
    //             body.append(`<tr>
    //                 <td>${item.user.name}</td>
    //                <td>${item.user.email}</td>
    //                <td>${item.locations.country.name}</td>
    //               </tr>`)
    //         });
           
    
    //     }
    
    // }).catch(function(e){
    //     console.error(e)
    // })

    // $('.table').DataTable().draw();
    
    // fetch("/api/auth/employee")
    // .then(response =>response.json())
    // .then(data =>{
    //     console.log(data)
    // }).catch(function(e){
    //     console.error(e)
    // })
    

    // axios.get("/api/auth/employee")
    // .then(function (response) {
    //     // console.log(response.data.employee)
    //     var employee = response.data.employee
    //     if (response.data.success) {

    //         var table = $('.')
    //         var body = $('#employeeTableBody');
    //             body.empty();
    //           employee.forEach(function(item){
    //             body.append(`<tr>
    //                 <td>${item.user.name}</td>
    //                <td>${item.user.email}</td>
    //                <td>${item.locations.country.name}</td>
    //               </tr>`)
    //         });
           
    
    //     }
    // })
    // .catch(function (e) {
    //     console.error(e);
    // });
//for opening a modal
    $('.openModal').on('click',function(){
       $('.addModal').show();
    })
// posting a data to the database
    $('.submitLoc').on('click',()=>{
       var input = $('#locationName')
       var country_id = $('.countryData')

       //validation for empty input
       if(input.val().trim() === ""){
            // alert("Please fill out the field");
            toastr.error("Please Fill out the Field")
            return
       }
       let formdata = new FormData()
       formdata.append('locationName',input.val().trim())
       formdata.append('country_id', country_id.val().trim())
       //axios used to post the data
       axios.post('/api/auth/add-location',formdata).then((response)=>{
          closeData()//closing of modal
          displayTable()// refreshing automatically the table
          clearFields()
          toastr.success("Added Successfully");//feedback
       }).catch((error)=>{
          console.error(error)
       })

    })
})

//function for clearing input field
function clearFields(){
    $('#locationName').val('')
}
//to display data from database
function displayTable(){
    axios.get('api/admin/location').then((response)=>{
       var locations = response.data.loc
        if(response.data.success){
            console.log(locations)
            var table = $('#employeeTable').DataTable()
        
            table.clear()
        locations.forEach((item,index) =>{
            table.row.add([
                `<div class="text-left">${ index + 1}</div>`,
                `<div>${ item.name}</div>`,
                `<div>${ item.country.name}</div>`,
                `<div class="text-center forTags"><a type="button" class="btn btn-info btn-sm" data-mdb-ripple-init onclick="viewLocation('${item.name}')">View</a>
                <a type="button" class="btn btn-primary btn-sm" data-mdb-ripple-ini onclick="editLocation(${item.id},'${item.name}')">Edit</a>
                <a type="button" class="btn btn-danger btn-sm deleteBtn" data-id="${item.id}" data-mdb-ripple-init >Delete</a></div>`,
                
            ])
            table.draw(false) 
        })
       
        }
    }).catch((error)=>{
        console.error(error)
    })
}
//when the dom is loaded
displayTable()


function editLocation(id,name){
    var input = $('#toUpdateInput')
    var location_id = $('#forEdit')
    $('.editModal').show()
    if($('.editModal').is(':visible')){
        input.val(name) // hte location input
        location_id.val(id)//this input is hidden
    }
}

// event handler for updating button
$('.updateBtn').on('click',()=>{
    var  x  = $('#toUpdateInput')
    var i = $('#forEdit')


    // let formEditData = new FormData()

    // formEditData.append('locationName',x.val().trim())

    axios.put('api/auth/update-location/' + i.val(),{
        locationName: x.val().trim()
    }).then((response)=>{
        console.log(response)
        displayTable()
        closeData()
        toastr.success("Location is successfully udpated")
    }).catch((error)=>{
        console.error(error)
    })
})

//function for closing modals
function closeData(){
    $('.addModal').hide();
    $('.editModal').hide();
    $('.viewModal').hide()
}

//function for deletion of data
// function deleteData(id){
//     axios.delete('api/admin/delete-data/' + id)
//     .then((response)=>{
//         console.log(response)
//         displayTable()
//         toastr.success("Location is Deleted Successfully")
//     }).catch(function(e){
//         console.error(e)
//     })

// }
$(document).on('click','.deleteBtn',function(){
    const id = $(this).data('id');
    console.log(id)
    axios.delete('api/admin/delete-data/' + id)
    .then((response)=>{
        console.log(response)
        displayTable()
        toastr.success("Location is Deleted Successfully")
    }).catch(function(e){
        console.error(e)
    })

})

// viewing of data
function viewLocation(name){
    var viewInput = $('#viewlocationName')
    $('.viewModal').show()
    if( $('.viewModal').is(':visible')){
        viewInput.val(name)
    }
}
