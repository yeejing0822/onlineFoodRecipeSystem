<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        $users = [['name'=>'Admin', 'email'=>'admin@gmail.com', 'pass'=> Hash::make('admin123'), 'role'=>'admin'],
        ['name'=>'Eren Yeager', 'email'=>'eren@gmail.com', 'pass'=> Hash::make('eren567'), 'role'=>'user'],
        ['name'=>'Gordan R.', 'email'=>'gordan55@gmail.com', 'pass'=> Hash::make('gordanr'), 'role'=>'user'],
        ['name'=>'Yakuza', 'email'=>'yakuzazzz@gmail.com', 'pass'=> Hash::make('yakuza123456'), 'role'=>'user'],
        ['name'=>'Tifa', 'email'=>'tifa@gmail.com', 'pass'=> Hash::make('tifa8876'), 'role'=>'user'],
        ['name'=>'Amelia Y. C.', 'email'=>'ameliayc@gmail.com', 'pass'=> Hash::make('ameliayc555'), 'role'=>'user'],
        ['name'=>'Tom H', 'email'=>'tomh32@gmail.com', 'pass'=> Hash::make('tomhhhhh'), 'role'=>'user']];

        
        //['user_id'=>'0', 'name'=>"", 'description'=> "", 'ingredients'=>"", 'steps'=>"", 'image'=> ""],
        $recipes = [['user_id'=>'5', 'name'=>"The Easiest Egg Fried Rice", 'description'=> "Try to use day-old rice. This ensures that there isn't too much moisture in the rice so that the fried rice does not end up being too mushy. If you are cooking rice on the same day, let the rice cool completely before stir frying.", 'ingredients'=>"4 large eggs| 3 tablespoons peanut, vegetable, or olive oil, divided| 1 cup diced onion, about 1 small onion| 1 1/2 to 2 cups diced mixed vegetables, such as bell pepper, carrots, zucchini, etc.| 1/2 cup sliced scallions, white and green parts divided| pinch of salt| 4 cups cooked overnight jasmine rice| 2 1/2 tablespoons soy sauce, use tamari if gluten free| 1/2 teaspoon five-spice powder| dash of ground white pepper, optional| 1 to 2 teaspoons toasted sesame oil", 'steps'=>"Crack the eggs into a small bowl and beat them together.| Heat a skillet with 1 tablespoon of the oil over medium-high heat. Once the pan is hot, add the beaten eggs and scramble them for about a minute. Transfer the eggs to a dish and turn off the heat.| Drizzle the remaining 2 tablespoons of oil into a wok over high heat. Add the onions and cook them for about 1 to 2 minutes, stirring constantly. Add the mixed vegetables and white parts of the scallions and cook for 2 minutes. Season the vegetables with a pinch of salt.| Add the cooked rice into the pan or wok and cook for several minutes, until the rice is heated through. If there are large clumps of rice, break them apart with the back of your spatula.| Add the soy sauce, five-spice powder, dash of white pepper (if using) and sesame oil and stir to distribute the seasonings. Add the scrambled eggs and stir to mix again. Garnish with remaining sliced scallions. Serve immediately.", 'image'=> 'https://healthynibblesandbits.com/wp-content/uploads/2018/02/Egg-Fried-Rice-4.jpg'],
        ['user_id'=>'1', 'name'=>"Chocolate Cheesecake", 'description'=> "This straightforward chocolate cheesecake is everything you want it to be: rich, moist, dense, and hugely chocolate. Not only that — it's simple to put together, requiring neither special ingredients, nor a fussy water bath. If you're looking for a very rich (and very chocolate) dessert, you've found it.", 'ingredients'=>"Crust:| 24 (269g) chocolate sandwich cookies, e.g., Oreos| 1/4 cup (28g) confectioners' sugar| 4 tablespoons (57g) butter, melted| Filling:| 1/2 cup (113g) milk| 2 cups (340g) semisweet chocolate chips or bittersweet chocolate chips| 1 teaspoon espresso powder, optional; for enhanced flavor| three 8-oz packages (680g) cream cheese, room temperature| 1 cup (198g) granulated sugar| 4 large eggs, at room temperature| 1 teaspoon vanilla extract| 2 tablespoons (14g) All-Purpose Flour", 'steps'=>"Preheat the oven to 375°F. Lightly grease a 9 inch springform pan.| To make the crust: Crush, grind, or otherwise pulverize the cookies together with the sugar; a food processor works well here. If desired, set aside about a tablespoon of the crumbs to garnish the finished cake.| Add the melted butter, processing briefly or stirring until the mixture is evenly crumbly. Press the moist crumbs into the bottom and partway up the sides of the prepared pan. Place the pan on a baking sheet, to catch any potential drips of butter.| Bake the crust for 15 minutes. Remove it from the oven, and set it aside as you make the filling.| Reduce the oven heat to 350°F.| To make the filling: Combine the milk and chocolate chips in a small saucepan or microwave-safe bowl or large cup. Heat, stirring frequently, until the chips melt and the mixture is smooth. Remove from the heat, stir in the espresso powder, and set the mixture aside.| In a large mixing bowl, beat together the cream cheese and sugar at low speed, until thoroughly combined. Scrape the bottom and sides of the bowl, and beat briefly, just until smooth.| Add the eggs one at a time, beating to combine after each one.| Stir in the vanilla, then the flour.| Add the chocolate/milk mixture, beating slowly until thoroughly combined. Scrape the bottom and sides of the bowl; beat briefly, just until smooth.| Pour the batter atop the crust in the pan. Place the pan on a baking sheet; this will make it easier to get the cake in and out of the oven safely.| Bake the cake (remember, the oven temperature should be 350°F) for 45 to 50 minutes, until a toothpick inserted into the cake 1 inch from the outside edge comes out clean. A digital thermometer, inserted at the same point, should read 175°F. The center may not look set; that's OK.| Turn off the oven, crack the door open several inches, and allow the cake to cool in the oven for 1 hour. Remove the cake from the oven, and set it on a rack to finish cooling. When it's completely cool, cover the cake, and refrigerate it until ready to serve.| Garnish the cake with the reserved crumbs. Serve it in small slices, with whipped cream and berries.", 'image'=> 'https://www.kingarthurbaking.com/sites/default/files/styles/featured_image/public/recipe_legacy/5463-3-large.jpg?itok=l5_GcsqP'],
        ['user_id'=>'4', 'name'=>'CHICKEN CURRY WITH POTATOES', 'description'=> "Chicken curry with potatoes is a common chicken curry in Malaysia. This easy chicken curry recipe takes 30 minutes from start to finish.", 'ingredients'=>"1 pack instant curry paste (8 oz. or 250 g)| 8 oz. (226 g) peeled potatoes| 2 lbs. (1 kg) chicken (4 drumsticks and 4 thighs or 4 leg quarters)| 3 shallots, peeled and sliced thinly| 2 lemongrass, use the white parts only, pounded| 1 tablespoon oil| 2 cups (500 ml) water| 1/2 cup (100 ml) coconut milk| 1 sprig curry leaves, optional", 'steps'=>"Cut the chicken into pieces. Leave the chicken bone-in. If you prefer boneless chicken meat, then debone the chicken.| Heat up a deep pot and add the oil. Saute the sliced shallots until aromatic or light brown in color. Add the curry paste into the pot and stir until aromatic. Add the chicken meat and lemongrass. Stir for 1 minute before adding the water.| Cover the pot and lower the heat to medium. Bring the curry chicken to boil and then lower the heat, add the potatoes and simmer for 20 minutes or so or until the chicken become tender. Add the coconut milk and bring it to boil. Serve hot.| Alternatively, you can leave the chicken overnight before adding the coconut milk the next day. This cooking method ensures that the chicken meat is really tender and aromatic as the flavor develops overnight. Serve the chicken curry the next day if you use this method.", 'image'=> 'https://rasamalaysia.com/wp-content/uploads/2009/02/chickencurry-1-320x320.jpg'],
        ['user_id'=>'3', 'name'=>"Egg Tarts (Hong Kong Style)", 'description'=> "This Cantonese Egg Tart is a very traditional Chinese dessert that you'll find in many Hong Kong restaurants (茶餐廳 Cha Chaan Teng).", 'ingredients'=>"Ingredients of crust:| 200 gm plain flour| 25 gm cake flour| 125 gm butter| 55 gm icing sugar| 1 egg, whisk| a dash vanilla extract| Ingredients of custard:| 2 eggs| 70 gm caster sugar| 150 gm hot water| 75 gm evaporated milk| ½ tsp vanilla extract", 'steps'=>"Method (making crust):\nPlace butter at room temperature until softened. Cream the butter and sugar with an electric mixer over medium speed until the mixture is smooth, fluffy and light in color.| Add in whisked egg, half at a time, beat over low speed. Add vanilla extract, mix well.| Sift in flour in two batches, scraping down the sides of the bowl between additions with a spatula, and make sure all ingredients combine well. Knead into dough.| Roll out the dough to a 1/2 cm thickness. Cut dough with a cookie cutter that is just a bit smaller than your tart tin in size. Line dough in the middle of tart tins, one by one. Lightly press the dough with your thumbs, starting from the bottom then up to the sides. While pressing the dough, turn the tart tin clockwise/anti-clockwise in order to make an even tart shell. Trim away any excess dough.| Method (making custard):\nAdd sugar into hot water, mix until completely dissolved.| Whisk egg with evaporated milk. Pour in sugar water. Mix well.| Sift egg mixture to get rid of any foam into a tea pot. Carefully pour egg mixture into each tart shell.| Method (baking tarts):\nPreheat oven to 200C. Position rack in lower third of oven. Bake tarts for 10 to 15 minutes until the edges are lightly brown.| Lower the heat to 180C. Keep an eye on them. Once you see the custard being puffed up a bit, pull the oven door open about 2 to 3 inches. Bake for another 10 to 15 minutes until the custard is cooked through. Just insert a toothpick into the custard. If it stands on its own, it is done.", 'image'=> 'https://lh4.ggpht.com/_V0CoK16CILc/Sb0DtIo-_MI/AAAAAAAAFQA/aT3pYzaXlQw/s800/%E9%9B%9E%E8%9B%8B%E6%92%BB%20Cantonese%20Egg%20Tarts01.jpg'],
        ['user_id'=>'2', 'name'=>"FRESH SPRING ROLLS (POPIAH)", 'description'=> "Popiah (Malaysian Fresh Spring Rolls) recipe - Commonly found in Malaysia, Singapore, Medan, and Taiwan. This dish is popular street food and just as easy at home with healthy ingredients, tastes SO GOOD!", 'ingredients'=>"3/4 cup cooking oil| 20 fresh popiah wrappers| Fresh lettuce leaves, wash and drained dry| FILLINGS:| 3 cloves garlic, finely minced| 8 oz. shrimp (226 g) , shelled, deveined and cut into small pieces| 2 lbs. (1 kg) yambean or jicama, grated| 2 oz. (56 g) french beans, sliced| 4 bean curd, diced into small pieces| Some store-bought fried shallot crisps, optional| SEASONINGS:| 1 teaspoon salt or to taste| 1/2 teaspoon white pepper powder| 1 teaspoon sugar or to taste| 1 cup water| SAUCES:| 1/2 cup sweet sauce, tee cheo or hoisin sauce| 1/4 cup chili sauce, sriracha or Lingham Hot Sauce", 'steps'=>"Heat up your wok with 1/4 cup oil, shallow fry the bean curd until lightly browned. Dish out and drain on paper towels.| In a deep pot, add in the remaining oil until heated. Transfer the garlic into the deep pot and stir fry until aromatic, add in the prawn and stir fry until slightly cooked.| Add in the yambean or jicama, french beans, salt, pepper, sugar and water, stir well. Reduce the heat and simmer until the yambean or jicama turns soft, for about 30 minutes. Taste the filling, add more salt and sugar to taste. Dish out the filling and keep aside to cool. The filling might be slightly watery.| Lay a piece of the Popiah wrapper on a flat board. Spread a little sweet sauce or hoisin sauce and a little chili sauce on it. Place a lettuce leaf over the sauces. Spoon 3 tablespoons of filling onto the leaf. Top with the fried bean curd and fried shallot crisps. Fold up the two sides of the wrapper and roll up. (You can view the step-by-step pictures of rolling popiah here.) If you wish, you can scoop a tablespoon of the filling juice on top of the Popiah. Serve immediately.", 'image'=> 'https://rasamalaysia.com/wp-content/uploads/2012/09/popiah_thumb-480x480.jpg'],
        ['user_id'=>'6', 'name'=>"GRASS JELLY BROWN SUGAR MILK", 'description'=> "Grass Jelly Brown Sugar Milk. A sweet milky dessert beverage with bouncy grass jelly cubes. Very easy to make at home and absolutely delicious! This recipe is vegan.", 'ingredients'=>"549 grams canned grass jelly| 4 cups oat milk or milk of choice| ½ cup brown sugar| ½ cup water| Ice cubes", 'steps'=>"Open your canned grass jelly and pop the jelly out onto a cutting board. Careful, it's slippery. Slice the jelly into half. Slice one half into little cubes and the other half into medium size cubes. This is optional but it gives you a variety of texture. Place the grass jelly cubes into separate bowls.| In a small sauce pan, add brown sugar and whisk in your water. Bring this is a boil and then lower to a simmer to allow this to reduce to a thick syrup.| Pour half of your brown sugar syrup into each bowl of grass jelly and mix gently with a spatula.| In a tall glass, spoon some of the grass jelly (medium or small, your choice) into the base.| Then add about ½ cup of ice topped off with more grass jelly.| Next, spoon some of your brown sugar and pour the syrup along the walls of the glass to create a marble effect (optional).| Layer with more grass jelly and ice| Pour 1 cup milk over top (per glass) and enjoy!", 'image'=> 'https://christieathome.com/wp-content/uploads/2020/11/Grass-Jelly-Brown-Sugar-Milk-8-2048x2048.jpg'],
        ['user_id'=>'3', 'name'=>"Velvety Creme Caramel Pudding", 'description'=> "My husband and I have enjoyed this simple pudding recipe many times, especially after a Tex-Mex meal. In fact, I've made it so often I don't even look at the recipe. See if it doesn't become a regular favorite at your house.", 'ingredients'=>"FOR CARAMEL SYRUP:| ½ cup sugar(100 g)| FOR PUDDING:| 3 egg yolks| 2 eggs| 1 teaspoon vanilla| ½ cup sugar(100 g)| 1 ½ cups milk(360 mL)| 6 tablespoons heavy cream", 'steps'=>"Start by melting ½ a cup (100 G) sugar in a pan. Keep on stiring until it becomes a syrup.| Take 3 pudding bowl and pour the caramel syrup equally into the bowls.| Add 3 egg yolks, 2 eggs, 1 tsp of vanilla and half cup of sugar in a glass jar. Whisk the ingredients thoroughly.| Heat one and half cup of milk in a pan. Add 6 tbsp of heavy cream into the same pan. Whisk the ingredients to avoid the thick layer of the milk on top.| Gently strain the mixter into the glass jar with the other ingredients and whisk all of it together.| Carefullly pour the pudding mixture equally on top of the caramel syrup in each pudding bowl.| Boil water in a pan and gently place each bowls in it. Cover the lid of the pan. Steam it for good 25 to 30 minutes.| Refigerate the pudding until cold.| Enjoy!", 'image'=> 'https://lovefoodies.com/wp-content/uploads/2018/04/Creme-Caramel-Custard-F.png'],
        ['user_id'=>'7', 'name'=>"AVOCADO PASTA", 'description'=> "The easiest, most unbelievably creamy avocado pasta. And it will be on your dinner table in just 20 min!", 'ingredients'=>"12 ounces spaghetti| 2 ripe avocados, halved, seeded and peeled| 1/2 cup fresh basil leaves| 2 cloves garlic| 2 tablespoons freshly squeezed lemon juice| Kosher salt and freshly ground black pepper, to taste| 1/3 cup olive oil| 1 cup cherry tomatoes, halved| 1/2 cup canned corn kernels, drained and rinsed", 'steps'=>"In a large pot of boiling salted water, cook pasta according to package instructions; drain well.| To make the avocado sauce, combine avocados, basil, garlic and lemon juice in the bowl of a food processor; season with salt and pepper, to taste. With the motor running, add olive oil in a slow stream until emulsified; set aside.| In a large bowl, combine pasta, avocado sauce, cherry tomatoes and corn.| Serve immediately.", 'image'=> 'https://s23209.pcdn.co/wp-content/uploads/2014/06/IMG_2388edit-360x360.jpg']];

        $comments = [
        ['user_id'=>'1', 'recipe_id'=>'6', 'comment'=> "SIMPLE And NICE"],
        ['user_id'=>'1', 'recipe_id'=>'2', 'comment'=> "Nice, This is so detailed."],
        ['user_id'=>'2', 'recipe_id'=>'1', 'comment'=> "If you want more flavor, you can add a drizzle of teriyaki sauce or hoisin sauce."],
        ['user_id'=>'2', 'recipe_id'=>'2', 'comment'=> "Purposely brought an oven just for this cake, HAHAHA"],
        ['user_id'=>'3', 'recipe_id'=>'1', 'comment'=> "Easy and Clear, Nice!"],
        ['user_id'=>'3', 'recipe_id'=>'4', 'comment'=> "Tried. Taste so good, My Family like it so much. Thanks for Sharing!"],
        ['user_id'=>'4', 'recipe_id'=>'7', 'comment'=> "OMG! Im looking for this! THANK YOU!"],
        ['user_id'=>'4', 'recipe_id'=>'4', 'comment'=> "Best For BREAKFAST!!!"],
        ['user_id'=>'4', 'recipe_id'=>'3', 'comment'=> "You can buy Instant curry paste on Amazon. This is the brand I use."],
        ['user_id'=>'5', 'recipe_id'=>'6', 'comment'=> "Im Vegan and this is so good for a burning day!"],
        ['user_id'=>'6', 'recipe_id'=>'6', 'comment'=> "OH, I missed it so much. Thanks for sharing!"],
        ['user_id'=>'6', 'recipe_id'=>'8', 'comment'=> "Gonna Try it out!"],
        ['user_id'=>'7', 'recipe_id'=>'8', 'comment'=> "Looks so weird but it's actually tasty."],
        ['user_id'=>'3', 'recipe_id'=>'5', 'comment'=> "It's tasted not bad for me, and quite healthy. "]];

        $ratings = [
        ['user_id'=>'5', 'recipe_id'=>'1', 'rating'=> '4'],
        ['user_id'=>'5', 'recipe_id'=>'2', 'rating'=> '5'],
        ['user_id'=>'3', 'recipe_id'=>'4', 'rating'=> '4'],
        ['user_id'=>'3', 'recipe_id'=>'6', 'rating'=> '4'],
        ['user_id'=>'4', 'recipe_id'=>'3', 'rating'=> '5'],
        ['user_id'=>'4', 'recipe_id'=>'7', 'rating'=> '5'],
        ['user_id'=>'2', 'recipe_id'=>'4', 'rating'=> '4'],
        ['user_id'=>'2', 'recipe_id'=>'8', 'rating'=> '5'],
        ['user_id'=>'2', 'recipe_id'=>'6', 'rating'=> '5'],
        ['user_id'=>'7', 'recipe_id'=>'5', 'rating'=> '3'],
        ['user_id'=>'1', 'recipe_id'=>'2', 'rating'=> '4'],
        ['user_id'=>'1', 'recipe_id'=>'3', 'rating'=> '5'],
        ['user_id'=>'6', 'recipe_id'=>'1', 'rating'=> '5'],
        ['user_id'=>'6', 'recipe_id'=>'5', 'rating'=> '3']];


        foreach($users as $user) {
            DB::table('users')->insert([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => $user['pass'],
                'role' => $user['role'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        };

        foreach($recipes as $recipe) {
            DB::table('recipes')->insert([
                'user_id' => $recipe['user_id'],
                'name' => $recipe['name'],
                'description' => $recipe['description'],
                'ingredients' => $recipe['ingredients'],
                'steps' => $recipe['steps'],
                'image' => $recipe['image'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        };

        foreach($comments as $comment) {
            DB::table('comments')->insert([
                'user_id' => $comment['user_id'],
                'recipe_id' => $comment['recipe_id'],
                'comment' => $comment['comment'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        };

        foreach($ratings as $rating) {
            DB::table('ratings')->insert([
                'user_id' => $rating['user_id'],
                'recipe_id' => $rating['recipe_id'],
                'rating' => $rating['rating'],
                'created_at' => $now,
                'updated_at' => $now
            ]);
        };
    }
}
