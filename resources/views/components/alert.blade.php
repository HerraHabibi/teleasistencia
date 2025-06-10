@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Éxito',
        text: '{{ session('success') }}',
        confirmButtonColor: '#3085d6',
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
        confirmButtonColor: '#d33',
    });
</script>
@endif

@if ($errors->any())
  <script>
      Swal.fire({
          icon: 'error',
          title: 'Error',
          html: `
              <ul style="text-align: left; padding-left: 1.2em;">
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          `,
          confirmButtonColor: '#d33',
          customClass: {
              popup: 'swal-wide'
          }
      });
  </script>
@endif
