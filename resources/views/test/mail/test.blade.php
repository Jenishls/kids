<style>
.cardDetail{
    display:flex;
    align-items: center;
}
.cardDetail img{
    width:100%;
    margin-left:7px;
}
.cardDetail label{
    width:60px;
}
.checkImg{
    display:flex;
    align-items: center;
}
.cardNumber{
    padding:20px;
}
</style>
<div class="cs-bg-white">
    <div class="cardDetail">
        <div class="checkImg">
            <input type="radio" name="" checked>
            <label for=""><img src="{{asset('cratesOnSkatesImages/cards/discover.svg')}}" alt=""></label>
        </div>
        <div class="cardNumber">DISCOVER CARD 
            <span style="font-style:italic;"> *ending with 2356</span>
        </div>
        <div class="global-btn global-btn__yellow cs-add-qty  m-l-5" id="js--apply-coupon">
            <p class="fs-13 pd-15-x-i">Change</p>
        </div>
    </div>
</div>