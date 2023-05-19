function initMap() {
    const geocoder = new google.maps.Geocoder();
    const map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: { lat: -33.8688, lng: 151.2093 } // Coordenadas iniciais do mapa
    });
  
    const enderecoInput = document.getElementById('endereco');
  
    document.querySelector('form').addEventListener('submit', function (event) {
      event.preventDefault();
  
      const endereco = enderecoInput.value;
  
      geocoder.geocode({ address: endereco }, function (results, status) {
        if (status === 'OK') {
          const location = results[0].geometry.location;
  
          map.setCenter(location);
  
          new google.maps.Marker({
            position: location,
            map: map,
            title: 'Local da Reserva'
          });
        } else {
          alert('Endereço não encontrado. Por favor, insira um endereço válido.');
        }
      });
    });
  }