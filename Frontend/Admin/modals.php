
<div class="modal-lg modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">NEW POST</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../../Backend/request.php" method="POST" enctype="multipart/form-data" class="px-2 addform" >
            <div class="d-flex container-fluid  px-0">
                <div class="w-50 mr-">
                    <label for="" class="form-label">Blog Title</label>
                    <input class="form-control" type="text" name="title" id="" placeholder="Enter blog title" required><br>
                </div>
             
                <div class="w-50 mx-1 m-0">
                    <label for="" class="form-label">Category</label>
                    <select class="form-control" name="category" id="">
                      <option value="Best Filipino Food">Best Filipino Food</option>
                      <option value="Budget Meals">Budget Meals</option>
                      <option value="Classic Ulam">Classic Ulam</option>
                      <option value="Saucy Ulam">Saucy Ulam</option>
                    </select> 
                </div>
                
            </div>
            <label for="" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="" row="3" required ></textarea><br>
            <label for="" class="form-label">Ingredients</label>
            <textarea class="form-control" name="ingredients" id=""  required ></textarea><br>
            <label for="" class="form-label">Recipe</label>
            <textarea class="form-control" name="recipe_procedure" id=""  required ></textarea><br>
            <label for="" class="form-label">Image</label><br>
            <input class="form-control" type="file" name="img" id="img" required><br><br>
            <div class="w-100 text-center">
               <button type="submit" name="add_blog" class="btn btn-primary mx-auto text-center">Submit</button>
            </div>

        </form>
      </div>
     
    </div>
  </div>
</div>


<div class="modal-lg modal fade" id="updateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">UPDATE POST</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="../../Backend/request.php" method="POST" enctype="multipart/form-data">
      <div class="d-flex container-fluid  px-0">
          <div class="w-50 mr-">
            <input type="hidden" id="blogID" name="blogID">
            <label for="" class="form-label">Blog Title</label>
                <input class="form-control" type="text" name="title" id="edit-title" placeholder="Enter blog title" required><br>
            </div>
         
          <div class="w-50 mx-1 m-0">
              <label for="" class="form-label">Category</label>
              <select class="form-control" name="category" id="edit-category">
                  <option value="Best Filipino Food">Best Filipino Food</option>
                  <option value="Budget Meals">Budget Meals</option>
                  <option value="Classic Ulam">Classic Ulam</option>
                  <option value="Saucy Ulam">Saucy Ulam</option>
              </select>
          </div>
          </div>
          <label for="" class="form-label">Description</label> 
          <textarea class="form-control" name="description" id="edit-description" placeholder="Enter description" required></textarea><br>
          <label for="" class="form-label">Ingredients</label>
          <textarea class="form-control"  name="ingredients" id="edit-ingredients" placeholder="Enter ingredients" required></textarea><br>
          <label for="" class="form-label">Recipe</label>
          <textarea class="form-control"  name="recipe_procedure" id="edit-recipe_procedure" placeholder="Enter procedure" required></textarea><br>
          <label for="" class="form-label">Image</label><br>
          <input class="form-control"  type="hidden" name="date" id="edit-date">
          <input class="form-control" type="file" name="img" id="img" ><br><br>
          <div class="w-100 text-center">
              <button type="submit" name="update_blog" class="btn btn-primary">Submit</button>
            </div>
          
      </form>


      </div>
    </div>
  </div>
</div>
<div class="modal-lg modal fade " id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered ">
    <div class="modal-content w-100">
      <div class="modal-header position-relative">
        <h1 class="modal-title fs-5 " id="staticBackdropLabel">VIEW POST</h1>
        <button type="button" class="btn-close   " data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <main class="  d-flex fs-6">
            <section class="w-50 px-2">
              <div class=" text-center my-1  h-50">
                <img  alt="img" id="myimg" >
              </div>
              <div class="mt-3">
              <div class="my-1 lh-2">
                <p  class="my-1" id="view-date"></p>
                <p id="title" class="font-bolder"></p><span  class=" fw-light" id="category"></span>
                <p id="description"></p>
              </div>
              </div>
              
            </section>
            <section class=" w-50 py-2 px-3 lh-2">
            <div>
              <p id="ingr">Ingredients</p>
              <p id="ingredients"></p>
              <p id="proce">Procedure</p>
              <p id="procedure"></p>
          </div>
            </section>

        </main>
      </div>
    
    </div>
  </div>
</div>