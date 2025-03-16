<script>

  const getDataClient = () => {
    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {'type' : 'practice','status' : 1},
      'success' : (res) => {
        $("#tableData tbody").html('')
        let no = 0

        $.each(res, (i, val) => {

          $("#tableData tbody").append(`
            <tr>
            <td>${++no}.</td>
            <td>${val.title}</td>
            <td>${val.time} menit</td>
            <td>${val.count_question}</td>
            <td>

            <a type="#" 
            class="btn text-white bg-info my-1" 
            data-toggle="modal" 
            data-target="#detailModal"
            data-id="${val.id}"
            data-name="${val.title}"
            >${val.answer ? 'Lihat Latihan' :'Mulai Latihan'}</a>
            </td>
            </tr>
            `)
        })
        
        $("#tableData").DataTable()
      }
    })
  }
  getDataClient()

  $(document).on('click',`[data-target="#detailModal"]`, function(){
    $.ajax({
      'url' : "<?= base_url("api/question") ?>",
      'type' : 'json',
      'method' : 'get',
      'data' : {id:$(this).data('id')},
      'success' : (res) => {

        $(".title").html(res.title)
        $(".time").html(res.time)
        $(".count_question").html(res.count_question)
        $(".description").html(res.description)
        $(".mulai-latihan").data('id',res.id)
        $(".twk").html(res.pg_twk)
        $(".tiu").html(res.pg_tiu)
        $(".tkp").html(res.pg_tkp)
      }
    })
  })

  $(".mulai-latihan").click(() => {
    const id = $(".mulai-latihan").data('id')
    window.location.href = "<?= base_url('user/do_latihan/') ?>"+id
  })

</script>