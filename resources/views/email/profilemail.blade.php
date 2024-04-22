
<style>
    .main{
        width:100%;
        padding:20px 10px;
        background:white;
    }

    .obj{
        font-weight:bold;
        font-size:25px;
        color:#154373;
    }

    .message{
        color:#004274;
    }

</style>

<div class="main">
    <span class="obj">Name :</span>
    <span class="obj">{{$details['name']}}</span>
    <br>
    <span class="obj">Phone :</span>
    <span class="obj">{{$details['phone']}}</span>
    <br>
    <span class="obj">Email :</span>
    <span class="obj">{{$details['email']}}</span>
    <br>
    <span class="obj">Message :</span>
    <br><br>
    <p class="message">{{$details['message']}}</p>
</div>