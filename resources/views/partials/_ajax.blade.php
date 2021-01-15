<script>
    $(document).ready(function(){
        $('#addcomment').on('submit',function(e){
            e.preventDefult();
            $.ajax({
                type : "POSt",
                url : "{{ route('comments.store') }}",
                data: $('#addcomment').serialize(),
                success : function(res){
                    console.log(res)
                    $('#sadi').modal('hide')


                },
                error : function(error){
                    console.log(error);
                    alert("fuck you");
                }


            });
        });

    });

</script>
