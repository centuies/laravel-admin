<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
			'id'=>1,
            'pid' => 0,
            'menu_name' => '系统配置',
            'route' =>'',
			'icon'=> 'fa fa-gears',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>2,
            'pid' => 1,
            'menu_name' => '站点配置',
            'route' =>'siteconfig.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);
		DB::table('menus')->insert([
			'id'=>3,
            'pid' => 1,
            'menu_name' => '保存配置',
            'route' =>'siteconfig.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);
		DB::table('menus')->insert([
			'id'=>4,
            'pid' => 1,
            'menu_name' => '修改密码',
            'route' =>'reset.index',
			'icon'=> 'fa fa-bars',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>5,
            'pid' => 1,
            'menu_name' => '更新密码',
            'route' =>'reset.update',
			'icon'=> 'fa fa-bars',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);
		DB::table('menus')->insert([
			'id'=>6,
            'pid' => 0,
            'menu_name' => '菜单管理',
            'route' =>'',
			'icon'=> 'fa fa-bars',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);
		DB::table('menus')->insert([
			'id'=>7,
            'pid' => 6,
            'menu_name' => '后台菜单',
            'route' =>'menu.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>8,
            'pid' => 7,
            'menu_name' => '添加菜单',
            'route' =>'menu.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>9,
            'pid' => 7,
            'menu_name' => '保存菜单',
            'route' =>'menu.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>10,
            'pid' => 7,
            'menu_name' => '修改菜单',
            'route' =>'menu.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>11,
            'pid' => 7,
            'menu_name' => '更新菜单',
            'route' =>'menu.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>12,
            'pid' => 7,
            'menu_name' => '删除菜单',
            'route' =>'menu.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>13,
            'pid' => 7,
            'menu_name' => '添加子菜单',
            'route' =>'menu.show',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);


		DB::table('menus')->insert([
			'id'=>14,
            'pid' => 6,
            'menu_name' => '导航管理',
            'route' =>'nav.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>15,
            'pid' => 14,
            'menu_name' => '添加导航',
            'route' =>'nav.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>16,
            'pid' => 14,
            'menu_name' => '保存导航',
            'route' =>'nav.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>17,
            'pid' => 14,
            'menu_name' => '修改导航',
            'route' =>'nav.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>18,
            'pid' => 14,
            'menu_name' => '更新导航',
            'route' =>'nav.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>19,
            'pid' => 14,
            'menu_name' => '删除导航',
            'route' =>'nav.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>20,
            'pid' => 14,
            'menu_name' => '添加子导航',
            'route' =>'nav.show',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>21,
            'pid' => 0,
            'menu_name' => '内容管理',
            'route' =>'',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>22,
            'pid' => 21,
            'menu_name' => '栏目管理',
            'route' =>'category.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>23,
            'pid' => 22,
            'menu_name' => '添加栏目',
            'route' =>'category.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>24,
            'pid' => 22,
            'menu_name' => '保存栏目',
            'route' =>'category.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>25,
            'pid' => 22,
            'menu_name' => '修改栏目',
            'route' =>'category.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>26,
            'pid' => 22,
            'menu_name' => '更新栏目',
            'route' =>'category.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>27,
            'pid' => 22,
            'menu_name' => '删除栏目',
            'route' =>'category.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>28,
            'pid' => 22,
            'menu_name' => '添加子栏目',
            'route' =>'category.show',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>29,
            'pid' => 21,
            'menu_name' => '文章管理',
            'route' =>'article.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>30,
            'pid' => 29,
            'menu_name' => '添加文章',
            'route' =>'article.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>31,
            'pid' => 29,
            'menu_name' => '保存文章',
            'route' =>'article.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>32,
            'pid' => 29,
            'menu_name' => '修改文章',
            'route' =>'article.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>33,
            'pid' => 29,
            'menu_name' => '更新文章',
            'route' =>'article.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>34,
            'pid' => 29,
            'menu_name' => '删除文章',
            'route' =>'article.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>35,
            'pid' => 0,
            'menu_name' => '用户管理',
            'route' =>'',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>36,
            'pid' => 35,
            'menu_name' => '普通用户',
            'route' =>'user.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>37,
            'pid' => 36,
            'menu_name' => '添加用户',
            'route' =>'user.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>38,
            'pid' => 36,
            'menu_name' => '保存用户',
            'route' =>'user.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>39,
            'pid' => 36,
            'menu_name' => '修改用户',
            'route' =>'user.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>40,
            'pid' => 36,
            'menu_name' => '更新用户',
            'route' =>'user.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>41,
            'pid' => 36,
            'menu_name' => '删除用户',
            'route' =>'user.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>42,
            'pid' => 35,
            'menu_name' => '管理员',
            'route' =>'admin.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>43,
            'pid' => 42,
            'menu_name' => '添加管理员',
            'route' =>'admin.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>44,
            'pid' => 42,
            'menu_name' => '保存管理员',
            'route' =>'admin.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>45,
            'pid' => 42,
            'menu_name' => '修改管理员',
            'route' =>'admin.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>46,
            'pid' => 42,
            'menu_name' => '更新管理员',
            'route' =>'admin.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>47,
            'pid' => 42,
            'menu_name' => '删除管理员',
            'route' =>'admin.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>48,
            'pid' => 35,
            'menu_name' => '权限组',
            'route' =>'authgroup.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>49,
            'pid' => 48,
            'menu_name' => '添加权限组',
            'route' =>'authgroup.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>50,
            'pid' => 48,
            'menu_name' => '保存权限组',
            'route' =>'authgroup.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>51,
            'pid' => 48,
            'menu_name' => '修改权限组',
            'route' =>'authgroup.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>52,
            'pid' => 48,
            'menu_name' => '更新权限组',
            'route' =>'authgroup.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>53,
            'pid' => 48,
            'menu_name' => '删除权限组',
            'route' =>'authgroup.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>100,
            'pid' => 48,
            'menu_name' => '授权',
            'route' =>'authgroup.show',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>54,
            'pid' => 0,
            'menu_name' => '扩展管理',
            'route' =>'',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>55,
            'pid' => 54,
            'menu_name' => '轮播分类',
            'route' =>'slide_category.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>56,
            'pid' => 55,
            'menu_name' => '添加轮播分类',
            'route' =>'slide_category.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>57,
            'pid' => 55,
            'menu_name' => '保存轮播分类',
            'route' =>'slide_category.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>58,
            'pid' => 55,
            'menu_name' => '修改轮播分类',
            'route' =>'slide_category.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>59,
            'pid' => 55,
            'menu_name' => '更新轮播分类',
            'route' =>'slide_category.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>60,
            'pid' => 55,
            'menu_name' => '删除轮播分类',
            'route' =>'slide_category.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>61,
            'pid' => 54,
            'menu_name' => '轮播图管理',
            'route' =>'slide.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>62,
            'pid' => 61,
            'menu_name' => '添加轮播图',
            'route' =>'slide.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>63,
            'pid' => 61,
            'menu_name' => '保存轮播图',
            'route' =>'slide.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>64,
            'pid' => 61,
            'menu_name' => '修改轮播图',
            'route' =>'slide.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>65,
            'pid' => 61,
            'menu_name' => '更新轮播图',
            'route' =>'slide.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>66,
            'pid' => 61,
            'menu_name' => '删除轮播图',
            'route' =>'slide.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>67,
            'pid' => 54,
            'menu_name' => '友情链接',
            'route' =>'link.index',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>68,
            'pid' => 67,
            'menu_name' => '添加友情链接',
            'route' =>'link.create',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>69,
            'pid' => 67,
            'menu_name' => '保存友情链接',
            'route' =>'link.store',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>70,
            'pid' => 67,
            'menu_name' => '修改友情链接',
            'route' =>'link.edit',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>71,
            'pid' => 67,
            'menu_name' => '更新友情链接',
            'route' =>'link.update',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);

		DB::table('menus')->insert([
			'id'=>72,
            'pid' => 67,
            'menu_name' => '删除友情链接',
            'route' =>'link.destroy',
			'icon'=> '',
			'status'=> 1,
			'menu_sort'=>0,
			'created_at'=>Carbon::now('Asia/Shanghai'),
			'updated_at'=>Carbon::now('Asia/Shanghai'),
		]);


		

    }




}
