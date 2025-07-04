import React, { useState } from "react";
import Food from "../../../foodimage";
import { useEffect } from "react";
import { useLocation } from "react-router-dom";
import Header from "../../header/header";
import Footer from "../../footer/footer";
import '../categories/categories.css'
import { useDispatch, useSelector } from "react-redux";
import { useHistory } from "react-router-dom";
import { addTocart, getTotals } from "../../cart/cartslice";

function Singledish(){
    const dispatch = useDispatch()
    const location = useLocation();
    const history = useHistory()
    const [detail, setdetail] = useState({})
    
    useEffect(() => {
        let data = Food.filter((ele) => ele.id == query.get('id'));
        console.log(data)
        setdetail(data[0])
    }, [])
    
    const cart = useSelector((state) => state.cart)
    
    useEffect(() => {
        dispatch(getTotals())
    }, [cart, dispatch])
    
    function AddtoCart(detail){
        dispatch(addTocart(detail))
    }
    
    let query = new URLSearchParams(location.search)
    
    function order(){
        history.push('/cart')
    }
    
    return(
        <>
        <div className="sfp-bg">
            <Header />
            
            <div className="sfp-main">
                <div className="sfp-first">
                    <img src={detail.url} alt={detail.title}></img><br />
                </div>
                <div className="spf-second">
                    <h1>{detail.title}</h1>
                    <h3>[{detail.quantity}]</h3>
                    <br />
                    <h1>₽{detail.rate}</h1>
                    <p><span>Описание:</span><br />{detail.description}</p>
                    <div><span>Доступно только:</span><p>с 9:00 до 21:00</p></div>
                    <br />
                    <button onClick={() => AddtoCart(detail)}>Добавить в корзину</button>
                    <button style={{marginLeft:'20px'}} onClick={order}>Заказать</button>
                </div>
            </div>
            <Footer />
        </div>
        </>
    )
}

export default Singledish