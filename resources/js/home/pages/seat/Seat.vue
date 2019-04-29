<template>
    <div class="seat-wapper">
        <div class="header">
            <div class="header-left">
                <div @click="back" class="iconfont back-icon">&#xe624;</div>
            </div>
            <div class="header-right">广西师范大学羽毛球场</div>
        </div>
        <div class="navlist">
            <ul>
                <li class="navli"
                    v-for="(item,index) in navList"
                    :key="index"
                    :class="{'activeT':nowIndex===index}"
                    @click="tabClick(index)">
                    <i>{{item.name}}</i><br/>
                    <i style="font-size:.12rem">16场可订</i>
                </li>
            </ul>
        </div>
        <div>
            <div class="time-list">
                <ul>
                    <li class="time-list-item">09:00-</li>
                    <li class="time-list-item">10:00-</li>
                    <li class="time-list-item">11:00-</li>
                    <li class="time-list-item">12:00-</li>
                    <li class="time-list-item">13:00-</li>
                    <li class="time-list-item">14:00-</li>
                    <li class="time-list-item">15:00-</li>
                    <li class="time-list-item">16:00-</li>
                    <li class="time-list-item">17:00-</li>
                    <li class="time-list-item">18:00-</li>
                    <li class="time-list-item">19:00-</li>
                    <li class="time-list-item">20:00-</li>
                    <li class="time-list-item">21:00-</li>
                    <li class="time-list-item">22:00-</li>

                </ul>
            </div>
            <div class="time-place">
                <ul>
                    <li class="place-item">1</li>
                    <li class="place-item">2</li>
                    <li class="place-item">3</li>
                    <li class="place-item">4</li>
                    <li class="place-item">5</li>
                    <li class="place-item">6</li>
                    <li class="place-item">7</li>
                    <li class="place-item">8</li>
                </ul>
            </div>
            <div class="swiper-container swiper_con">
                <div class="swiper-wrapper">
                    <!-- 第一个swiper -->
                    <div class="swiper-slide" ref="viewBox">
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>

                    </div>
                    <!-- 第二个swiper -->
                    <div class="swiper-slide">
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                    </div>

                    <!-- 第三个swiper -->
                    <div class="swiper-slide">
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                    </div>

                    <!-- 第四个swiper -->
                    <div class="swiper-slide">
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                    </div>

                    <div class="swiper-slide">
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                    </div>

                    <div class="swiper-slide">
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                    </div>

                    <div class="swiper-slide">
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                    </div>

                    <div class="swiper-slide">
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                        <Row>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                            <Col span="3">￥8</Col>
                        </Row>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "swiper",
        data() {
            return {
                navList:[
                    {name:'04-28'},
                    {name:'04-29'},
                    {name:'04-30'},
                    {name:'05-01'},
                    {name:'05-02'},
                    {name:'05-03'}
                ],
                nowIndex:0,
            }
        },
        components:{
        },
        mounted() {
            var that=this
            that.mySwiper = new Swiper('.swiper-container',{
                initialSlide:0,
                autoplay:false,
                keyboardControl:true,
                autoHeight:true,
                observer:true,
                observeParents:true,
                onSlideChangeStart:function(){
                    // console.log(that.mySwiper.activeIndex)
                    that.nowIndex=that.mySwiper.activeIndex
                }
            });
            // this.getList();
        },
        methods: {

            back(){
                this.$router.go(-1);
            },
            tabClick(index){
                this.nowIndex = index
                this.mySwiper.slideTo(index,1000,false)
            },
        },
        created(id){

        }
    }
</script>
<style>
    .seat-wapper{
        height: 1000vh;
    }
    .header{
        display: flex;
        line-height: .86rem;
        background: #00bcd4;
        color: #fff;
    }
    .header .header-left{
        width: .64rem;
        float: left;
    }
    .header .header-left .back-icon{
        text-align: center;
        font-size: .4rem;
    }
    .header .header-right{
        min-width: 1.04rem;
        padding: 0 .1rem;
        float: right;
        text-align: center;
        color: #fff;
        font-size: .26rem;
    }
    .header .header-right .arrow-icon{
        margin-left: -.04rem;
        font-size: .24rem;
    }


    .navlist{
        width:98%;
        height:55px;
        border-bottom:1px solid rgba(151,151,151,0.1);
        position:relative;
        margin-left: 2%;
    }
    .navli{
        padding:10px 0px;
        text-align:center;
        float:left;
        margin:0 .2rem;
    }
    .navli i{
        font-style: normal;
        font-size: .26px;
    }
    .activeT{
        color:#00bcd4;
        padding-bottom: .3rem;
        border-bottom: 2px solid #00bcd4;
    }

    .time-list{
        float: left;
        height: auto;
        width: 10%;
        border:1px #cccccc solid;
        padding-bottom: 30px;
    }

    .time-list .time-list-item{
        height: 30px;
        /* border-bottom: 1px #cccccc solid; */
        text-align: bottom;
        line-height: 60px;
        font-size: 0.26rem;
    }

    .time-place{
        float: left;
        height: 30px;
        line-height: 30px;
        border-bottom: #cccccc 1px solid;
    }
    .time-place .place-item{
        float: left;
        margin: 0 .32rem;

    }

    .swiper_con{
        width:80%;
        margin-bottom:40px;
        position:relative;
        /* border: 1px solid red; */
        margin-left: 0;
        margin-right: 0;
    }

    .ivu-col-span-3 {
        display: block;
        width: 12.5%;
        text-align: center;
        border-bottom: 1px #cccccc solid;
        border-right: 1px #cccccc solid;
        height: 30px;
        line-height: 30px;
    }
    .choosegrand{
        position:absolute;
        top:-3;
        right:0;
    }
    .show{
        display:block;
    }
    .none{
        display:none;
    }
</style>


