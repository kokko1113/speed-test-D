<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="list"></div>
</body>

</html>
<script>
    const list = document.querySelector(".list")

    const html = document.querySelector('html')
    const bodyHeight = document.body.clientHeight // bodyの高さを取得
    const windowHeight = window.innerHeight // windowの高さを取得
    const bottomPoint = bodyHeight - windowHeight // ページ最下部までスクロールしたかを判定するための位置を計算

    let page = 0
    fe()
    list.addEventListener("scroll", () => {
        const isBottom=list.scrollTop + list.clientHeight >=list.scrollHeight-1
        if (isBottom) { // スクロール量が最下部の位置を過ぎたかどうか
            page++
            fe()
        }
    })

    function fe() {
        fetch(`./api.php?page=${page}`, {
            method: "GET",
            header:{"Content-Type":"application/json"}
        }).then((res) => {
            return res.json()
        }).then((json)=>{
            console.log(json);
            json.map(element => {
                const div=document.createElement("div")
                div.textContent=element.name+"("+element.age+")"
                list.appendChild(div)
            });
        })
    }
</script>
<style>
    .list{
        height: 50vh;
        border: 1px solid black;
        overflow: auto;
    }
    .list div{
        height: 15vh;
    }
</style>