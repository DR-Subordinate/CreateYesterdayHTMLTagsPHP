<!DOCTYPE html>
<html>
  <head>
    <title>タグ作成ツール 昨日の注目</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <p class="my-3 mx-3 text-xl font-bold">昨日の注目</p>
    <form action="tag.php" method="POST" class="flex flex-col w-[500px] mx-3">
      <div class="mt-6 border border-black p-1">
        <p class="font-bold">管理番号</p>
        <textarea cols="50" rows="10" name="url" class="border border-black w-full"></textarea>
      </div>

      <div class="border-b border-l border-r border-black p-1 bg-slate-300">
        <p class="font-bold">商品名</p>
        <textarea cols="50" rows="10" name="name" class="border border-black w-full"></textarea>
      </div>

      <div class="mt-6">
        <input type="submit" value="タグ作成" class="px-2 border border-black rounded-md bg-slate-100 cursor-pointer active:shadow-xl">
      </div>
    </form>
  </body>
</html>
