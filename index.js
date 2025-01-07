$(document).ready(function() {
    // Function to fetch all recipes initially
    function fetchRecipes() {
        $.ajax({
            url: '../../Backend/request.php',
            type: 'POST',
            data: { "get_blogs": true },
            success: function(response) {
                let recipes;
                try {
                    recipes = JSON.parse(response);
                } catch (error) {
                    console.error('Failed to parse recipes JSON:', error);
                    return;
                }
            
                if (Array.isArray(recipes)) {
                    displayRecipes(recipes); 
                } else {
                    console.error('Recipes is not an array after parsing:', recipes);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching recipes:', status, error);
            }
        });
    }

    // Function to display recipes in the cards
    function displayRecipes(recipes) {
        const recipeContainer = $('.recipe-card-container'); 

       
        recipeContainer.empty();
        
       
        if (recipes.length === 0) {
            recipeContainer.append('<p class="no-results mt-5">No results found</p>'); 
            return;
        }
        
       
        recipes.forEach(function(recipe) {
            const cardHTML = `
                <div class="col-3">
                    <div class="all-recipes-card">
                        <a href="specified-recipe.php?id=${recipe.blogID}">
                            <img src="images/${recipe.img}" alt="">
                            <div class="card-body">
                                <p class="card-text">${recipe.title}</p>
                            </div>
                        </a>
                    </div>
                </div>
            `;
            recipeContainer.append(cardHTML);
        });
    }

   
    fetchRecipes();

    // Function to filter recipes based on the selected category
    function filterRecipes(category) {
        $('.filter-btn').removeClass('active');

        
        $(`.filter-btn[data-category="${category}"]`).addClass('active');

        $.ajax({
            url: '../../Backend/request.php',
            type: 'POST',
            data: { "get_filtered_blogs": true, "category": category },
            success: function(response) {
                let recipes;
                try {
                    recipes = JSON.parse(response);
                } catch (error) {
                    console.error('Failed to parse recipes JSON:', error);
                    return;
                }
            
                if (Array.isArray(recipes)) {
                    displayRecipes(recipes); 
                } else {
                    console.error('Recipes is not an array after parsing:', recipes);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error fetching filtered recipes:', status, error);
            }
        });
    }

  
    $('.filter-btn').click(function(event) {
        event.preventDefault(); 
        const category = $(this).data('category');
        filterRecipes(category); 
    });

    
    $('#search-input').on('input', function() {
        const query = $(this).val();      
        console.log(query);  
        $.ajax({
            url: '../../Backend/request.php',
            type: 'POST',
            data: { "search_blog": true, "search_value": query }, 
            success: function(response) {
                console.log('Server response:', response); 
                
                let recipes;
                try {
                    recipes = JSON.parse(response);
                } catch (error) {
                    console.error(response);
                    return;
                }
    
                if (Array.isArray(recipes)) {
                    displayRecipes(recipes); 
                } else {
                    console.error('Recipes is not an array after parsing:', recipes);
                } 
            },
            error: function(xhr, status, error) {
                console.error('Error fetching recipes:', status, error);
            }
        });
    });
});

