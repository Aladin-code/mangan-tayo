$(document).ready(function(){
    loadBlogs();  // Load blogs when the document is ready
});

function loadBlogs() {
    $.ajax({
        url: "../../Backend/request.php",  // Ensure this URL is correct
        method: "POST",
        data: {
            "get_blogs": true,  // Request for blogs
        },
        success: function(result) {
            // Pass the result to the renderTable function
            renderTable(result);
        },
        error: function(error) {
            alert("Something went wrong");
            console.error(error);  // Log the error for debugging
        }
    });
}

$('#search').on("input", function() {
    let search_value = $(this).val();
    if (search_value.trim() === "") {
        loadBlogs();  
    }else{
        $.ajax({
            url: '../../Backend/request.php',
            method: "POST",
            data: {
                "search_blog": true,
                search_value: search_value
            },
            success: function(result) {
                renderTable(result);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

});
// Render blogs into the table
function renderTable(result){
    let datas = JSON.parse(result);  // Parse the JSON response
    let tBody = '';  // Initialize empty table body

    if(datas.length === 0) {  // If no blogs are found
        tBody = `<tr><td colspan="4" class="text-center">No records found</td></tr>`;
    } else {
        // Loop through each blog data and render it
        datas.forEach(function(data){
            tBody += `<tr class="text-center">`;
            // Log the image source to ensure it's correct
            tBody += `<td>${data['title']}</td>`;
            tBody += `<td>${data['date']}</td>`;
            tBody += `<td>  
                        <button  onclick="viewBlog('${data['img']}', '${data['title']}','${data['description']}','${data['ingredients']}','${data['recipe_procedure']}','${data['category']}','${data['date']}')"
                            type="button" class=" btn btn-warning" data-bs-toggle="modal" data-bs-target="#viewModal" id="viewbtn">
                           View
                        </button>
                        <button onclick="updateBlog('${data['blogID']}','${data['img']}', '${data['title']}','${data['description']}','${data['ingredients']}','${data['recipe_procedure']}','${data['category']}','${data['date']}')"
                            type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateModal">
                            Update
                        </button>
                        <button class="btn btn-danger" onclick="deleteBlog('${data['blogID']}')">Delete</button>
                      </td>`;
            tBody += `</tr>`;
        });
    }

    // Inject the generated table rows into the table body
    $('#tBodyBlog').html(tBody);
}

// View blog details
function viewBlog(img, title, description, ingredients, recipe_procedure, category, date){
    console.log(img);  // Log the image name
    document.getElementById('myimg').src = `../User/images/${img}`;
    document.getElementById('title').innerText = title;
    document.getElementById('description').innerText = description;
    document.getElementById('ingredients').innerText = ingredients;
    document.getElementById('procedure').innerText = recipe_procedure;
    document.getElementById('category').innerText = category;
    document.getElementById('view-date').innerText = date;
}

// Update blog details (prefill the form)
function updateBlog(id, img, title, description, ingredients, recipe_procedure, category, date) {
    console.log(title);
    document.getElementById('blogID').value = id;
    // Assuming you want to show the image filename
    document.getElementById('edit-title').value = title;
    document.getElementById('edit-description').value = description;
    document.getElementById('edit-ingredients').value = ingredients;
    document.getElementById('edit-recipe_procedure').value = recipe_procedure;
    document.getElementById('edit-category').value = category;
    document.getElementById('edit-date').value = date;
}

// Delete a blog
function deleteBlog(id){
    if(confirm("Are you sure you want to delete this blog?")){
        window.location.href = `../../Backend/request.php?delete_blog=${id}`;
    }
}
