<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing:border-box;
        }
        body {
	    background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	    background-size: 400% 400%;
	    /* animation: gradient 15s ease infinite; */
	    height: 100vh;
        }

    @keyframes gradient {
	    0% {
		    background-position: 0% 50%;
	    }
	    50% {
		    background-position: 100% 50%;
	    }
	    100% {
		    background-position: 0% 50%;
	    }
    }

        .container{
            width:1000px;
            height:100vh;
            /* background-color:grey; */
            margin:auto;
            padding-top:20px;
        }
        .content{
            width:75%;
            height:100%;
            border:3px white double;
            background:linear-gradient(rgba(255, 255, 255, 0.5), transparent);
        }
        .flex{
            width:100%;
            height:14%;
            /* background-color:lightpink; */
            margin:auto;
            display:flex;
            flex-direction:row;
            /* border:1px black solid; */
            justify-content:space-around;
            align-items:center;
            padding:10px 0;

        }
        .item{
            width:100px;
            height:100px;
            /* background-color:lightblue; */
            border:1px black solid;
            text-align:center;
            padding-top:40px;
            border-radius:100%;
            background:linear-gradient(to bottom right, #abe6f5 50%, white 50%);
            transition:.3s;
        }
        .holiday{
            color:red;
            background-color:lightpink;
            border:3px dotted red;
        }
        .workday{
            color:black;
            border:3px double black;
        }
        .item:hover{
            transform:scale(1.3);
            z-index:10;
            transition:.3s;
            color:#031085;
            font-size:x-large;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="flex">
                <div class="item holiday">日</div>
                <div class="item workday">一</div>
                <div class="item workday">二</div>
                <div class="item workday">三</div>
                <div class="item workday">四</div>
                <div class="item workday">五</div>
                <div class="item holiday">六</div>
            </div>
            <!-- <div class="flex">
                <div class="item holiday">1</div>
                <div class="item workday">2</div>
                <div class="item workday">3</div>
                <div class="item workday">4</div>
                <div class="item workday">5</div>
                <div class="item workday">6</div>
                <div class="item holiday">7</div>
            </div>
            <div class="flex">
                <div class="item holiday">11</div>
                <div class="item workday">12</div>
                <div class="item workday">13</div>
                <div class="item workday">14</div>
                <div class="item workday">15</div>
                <div class="item workday">16</div>
                <div class="item holiday">17</div>
            </div>
            <div class="flex">
                <div class="item holiday">21</div>
                <div class="item workday">22</div>
                <div class="item workday">23</div>
                <div class="item workday">24</div>
                <div class="item workday">25</div>
                <div class="item workday">26</div>
                <div class="item holiday">27</div>
            </div>
            <div class="flex">
                <div class="item holiday">31</div>
                <div class="item workday">32</div>
                <div class="item workday">33</div>
                <div class="item workday">34</div>
                <div class="item workday">35</div>
                <div class="item workday">36</div>
                <div class="item holiday">37</div>
            </div>
            <div class="flex">
                <div class="item holiday">41</div>
                <div class="item workday">42</div>
                <div class="item workday">43</div>
                <div class="item workday">44</div>
                <div class="item workday">45</div>
                <div class="item workday">46</div>
                <div class="item holiday">47</div>
                </div>
            <div class="flex">
                <div class="item holiday">51</div>
                <div class="item workday">52</div>
                <div class="item workday">53</div>
                <div class="item workday">54</div>
                <div class="item workday">55</div>
                <div class="item workday">56</div>
                <div class="item holiday">57</div>
            </div>
        </div> -->
    </div>
</body>
</html>