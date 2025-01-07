// Load comments for the specific blog
function loadComments(blogID) {
    $.ajax({
        type: "POST",
        url: "../../Backend/request.php",
        data: { fetch_comments: true, blogID: blogID },
        success: function(response) {
            const comments = JSON.parse(response); // Parse JSON response
            const commentSection = $("#commentList");
            
            commentSection.empty(); // Clear any previous comments

            if (comments.length > 0) {
                comments.forEach(function(comment) {
                    const commentHTML = `
                        <div class="comment" style="padding-left: 40px">
                            <p><strong>${comment.username}:</strong> ${comment.comment_text}</p>
                        </div>
                    `;
                    commentSection.append(commentHTML); // Append comments
                });
            } else {
                commentSection.append("<p>No comments yet. Be the first to comment!</p>");
            }
        },
        error: function() {
            console.log("Error fetching comments.");
        }
    });
}
function countLikes(blogID) {
    $.ajax({
        type: "POST",
        url: "../../Backend/request.php", // Ensure this is the correct path to your PHP file
        data: {
            get_likes: true,
            blogID: blogID
        },
        success: function(response) {
            try {
                // Parse the JSON response
                const data = JSON.parse(response);

                // Check if 'totalLikes' exists in the response
                if (data.totalLikes !== undefined) {
                    // Update the total likes on the page
                    $('#totalLikes').text(data.totalLikes);
                    console.log(data.totalLikes);
                } else {
                    console.error('Total likes not found in the response');
                }
            } catch (error) {
                console.error('Error parsing JSON response:', error);
            }
        },
        error: function() {
            alert("Error fetching total likes!");
        }
    });

    
}


$(document).ready(function() {
    // The blogID from PHP is passed via a global variable
    loadComments(blogID);
    countLikes(blogID);
   
});


function toggleLike(button) {
    if (!userID) {
        alert('Please log in first');
        return; // Prevent the like action
    }
    const blogId = $(button).data('blog-id');
    const isLiked = $(button).hasClass('fa-solid'); // Check if it's currently liked (filled heart)

    // Toggle the icon and color for UI feedback
    if (isLiked) {
        $(button).removeClass('fa-solid').addClass('fa-regular'); // Switch to unfilled heart
        $(button).css('color', ''); // Reset to default color
    } else {
        $(button).removeClass('fa-regular').addClass('fa-solid'); // Switch to filled heart
        $(button).css('color', '#FFBD59'); // Change color to FFBD59 (golden yellow)
    }

    // Prepare AJAX data
    const requestData = {
        like: true,
        userID: userID, // Replace with actual user ID
        blogID: blogId
    };

    // Set action based on current state
    if (isLiked) {
        requestData.remove_like = true; // Indicate we want to remove a like
    } else {
        requestData.add_like = true; // Indicate we want to add a like
    }

    // Make AJAX request
    $.ajax({
        url: '../../Backend/request.php',
        type: 'POST',
        data: requestData,
        success: function(response) {
           
            countLikes(blogId);
        },
        error: function(xhr, status, error) {
            console.error('Error processing like/unlike:', status, error);
        }
    });
}

// Function to handle the share button
function copyLink() {
    const pageURL = window.location.href;
    const tempInput = document.createElement('input');
    document.body.appendChild(tempInput);
    tempInput.value = pageURL;
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Provide feedback to the user
    alert('Link copied to clipboard!');
}

// Listen for the Enter key on the comment input
$('#commentInput').keypress(function(e) {
    if (e.which == 13) { 
        if (!userID) {
            alert('Please log in first.');
            return; // Prevent the like action
        }// 13 is the Enter key
        e.preventDefault(); // Prevent default behavior (form submission)

        const commentText = $(this).val(); // Get the comment text
        const blogId = blogID; // Use the blog ID from the global variable

        if (commentText.trim() !== '') {
            const requestData = {
                add_comment: true,
                comment_text: commentText,
                blogID: blogId,
                userID: userID // Replace with the actual user ID
            };

            $.ajax({
                url: '../../Backend/request.php', // URL to handle the comment submission
                type: 'POST',   
                data: requestData,
                success: function(response) {
                    $('#commentInput').val(''); // Clear input field after submission
                    loadComments(blogId); // Refresh comments
                },
                error: function(xhr, status, error) {
                    console.error('Error submitting comment:', status, error);
                }
            });

            // Clear the input field after submission
            $(this).val('');
        }
    }
});
