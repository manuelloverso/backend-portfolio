<div class="lead-container">
    <h1>Nuovo messaggio ricevuto</h1>

    <p><strong>Mittente: </strong>{{ $lead['name'] }}</p>
    <p><strong>Mail: </strong>{{ $lead['email'] }}</p>
    <p><strong>Messaggio: </strong>{{ $lead['message'] }}</p>

</div>

<style>
    .lead-container {
        font-display: sans-serif;
    }

    p {
        margin: 1rem 0;
    }
</style>
