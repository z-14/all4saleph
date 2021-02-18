
    // Load more data
    $('.load-more').click(function()
    {
        var row = Number($('#row').val());
        var allcount = Number($('#all').val());
        row = row + 15;

        if(row <= allcount)
        {
            $("#row").val(row);

            $.ajax({
                url: 'loadmore.php',
                type: 'post',
                data: {row:row},
                beforeSend:function()
                {
                    $(".load-more").text("Loading...");
                },
                success: function(response)
                {

                    // Setting little delay while displaying new content
                    setTimeout(function() 
                    {
                        // appending posts after last post with class="post"
                        $(".post:last").after(response).show().fadeIn("slow");

                        var rowno = row + 15;

                        // checking row value is greater than allcount or not
                        if(rowno > allcount)
                        {

                            // Change the text and background
                            $('.load-more').text("Hide");
                        }else
                        {
                            $(".load-more").text("Load more");
                        }
                    }, 2000);
                }
            });
        }else{
            $('.load-more').text("Loading...");

            // Setting little delay while removing contents
            setTimeout(function() 
            {

                // When row is greater than allcount then remove all class='post' element after 3 element
                $('.post:nth-child(15)').nextAll('.post').remove().fadeIn("slow");

                // Reset the value of row
                $("#row").val(0);

                // Change the text and background
                $('.load-more').text("Load more");

            }, 2000);


        }

    });

