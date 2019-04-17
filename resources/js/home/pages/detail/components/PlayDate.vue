<template>
	<section class="playDate" ref="wrapper">
		<section>
			<router-link to="/seat" tag="div" v-for="item of list " :key="item.id">
				<Row :gutter="16" class="playItems" style="margin-left: 0px;">
					<Col span="6">
					<div style="float:left">{{item.date}}</div>
					</Col>
					<Col span="8">
					<div><span>{{item.freeCount}}</span>场可订</div>
					</Col>
					<Col span="6">
					<div><span>￥{{item.minPrice}}</span>起</div>
					</Col>
					<Col span="4">
					<div><Button type="info" class="bookBtn">预定</Button></div>
					</Col>
				</Row>
			</router-link>
			<router-link to="/seat">
				<Row :gutter="16" class="playItems" style="margin-left: 0px;">
					<Col span="6">
					<div style="float:left">04月16日</div>
					</Col>
					<Col span="10">
					<div><span>10</span>场可订</div>
					</Col>
					<Col span="4">
					<div><span>￥7</span>起</div>
					</Col>
					<Col span="4">
					<div><Button type="info" class="bookBtn">预定</Button></div>
					</Col>
				</Row>
			</router-link>
			<router-link to="/seat">
				<Row :gutter="16" class="playItems" style="margin-left: 0px;">
					<Col span="6">
					<div style="float:left">04月16日</div>
					</Col>
					<Col span="10">
					<div><span>10</span>场可订</div>
					</Col>
					<Col span="4">
					<div><span>￥7</span>起</div>
					</Col>
					<Col span="4">
					<div><Button type="info" class="bookBtn">预定</Button></div>
					</Col>
				</Row>
			</router-link>
			<router-link to="/seat">
				<Row :gutter="16" class="playItems" style="margin-left: 0px;">
					<Col span="6">
					<div style="float:left">04月16日</div>
					</Col>
					<Col span="10">
					<div><span>10</span>场可订</div>
					</Col>
					<Col span="4">
					<div><span>￥7</span>起</div>
					</Col>
					<Col span="4">
					<div><Button type="info" class="bookBtn">预定</Button></div>
					</Col>
				</Row>
			</router-link>
			<router-link to="/seat">
				<Row :gutter="16" class="playItems" style="margin-left: 0px;">
					<Col span="6">
					<div style="float:left">04月16日</div>
					</Col>
					<Col span="10">
					<div><span>10</span>场可订</div>
					</Col>
					<Col span="4">
					<div><span>￥7</span>起</div>
					</Col>
					<Col span="4">
					<div><Button type="info" class="bookBtn">预定</Button></div>
					</Col>
				</Row>
			</router-link>
		</section>
	</section>
</template>

<script>
    import Bscroll from 'better-scroll'
    export default{
        name:' detailplaydate',
        props: {
            list: Array
        },
        data(){
            return{

            }
        },
        mounted () {
            this.scroll = new Bscroll(this.$refs.wrapper)
        }
    }
</script>

<style>
	.playDate{
		height: 100vh;
	}
	.playDate .playItems{
		height:50px;
		width:100%;
		line-height:50px;
		font-size: .3rem;
		border-bottom: 1px #cccccc solid;
		color:#666666;
	}
	.playDate .playItems .bookBtn{
		font-size: .3rem;
		line-height: 0.8;
		padding: 5px 5px 6px;
	}
</style>

