<style>
                    *{
                            margin: 0;
                            padding: 0;
                        }
                        .rate {
                            float: left;
                            height: 100px;
                            padding: 0 10px;
                        }
                        .rate:not(:checked) > input {
                            position:absolute;
                            top:-9999px;
                        }
                        .rate:not(:checked) > label {
                            float:right;
                            width:1em;
                            overflow:hidden;
                            white-space:nowrap;
                            cursor:pointer;
                            font-size:60px;
                            color:#ccc;
                        }
                        .rate:not(:checked) > label:before {
                            content: '★ ';
                        }
                        .rate > input:checked ~ label {
                            color: #ffc700;    
                        }
                        .rate:not(:checked) > label:hover,
                        .rate:not(:checked) > label:hover ~ label {
                            color: orange;  
                        }
                        .rate > input:checked + label:hover,
                        .rate > input:checked + label:hover ~ label,
                        .rate > input:checked ~ label:hover,
                        .rate > input:checked ~ label:hover ~ label,
                        .rate > label:hover ~ input:checked ~ label {
                            color: #c59b08;
                        }

                </style>
<div class="rate" style="width: 20%;position: relative;">
                                    <span class="fa fa-star" style="font-size: 100px;display: block;margin: 0 auto;text-align: center ; color: #ff9705"></span>
                                    <b style="position: absolute;top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;font-size: 20px;">4.5</b>
                                </div>
                        <div class="rate">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                    <div class="rate" style="margin-top:25px ;margin-left: 40px;">
                        <a href="index.php" class="btn btn-success">COMMENT</a>
                    </div>