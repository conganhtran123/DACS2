<style>
    /* CSS cho form */
/* form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background: #f7f7f7;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
} */

.title {
    text-align: center;
    margin-bottom: 20px;
}

.title h2 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

.half {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.item {
    flex: 1;
    margin-bottom: 10px;
}

.item label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.item input,
.item textarea {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.full {
    margin-bottom: 20px;
}

.full label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.full textarea {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.action {
    text-align: center;
}

.btn {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    color: #fff;
    background: #333;
    transition: background 0.3s ease;
}

.btn:hover {
    background: #555;
}

</style>
<div class="container">
    <div class="contact">

        <div class="contact-content">
            <div class="contact-image">
                <img src="layout/images/contact-us.png" alt="">
            </div>
            <form target="_blank" action="https://formsubmit.co/conganh0905731703@gmail.com" method="POST">
                <div class="contact-form">
                    <div class="contact-heading">
                        <h1>Liên hệ với chúng tôi</h1>
                    </div>
                    <div class="contact-group">
                      
                        <div class="contact-label">Họ và tên</div>
                        <input type="text" id="name" name="name" placeholder="Nhập họ và tên...">
                    </div>
                    <div class="contact-group">
                        <div class="contact-label">Email</div>
                        <input type="text" id="email" name="email" placeholder="Nhập địa chỉ email...">
                    </div>
                    <div class="contact-group">
                        <div class="contact-label">Số điện thoại</div>
                        <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại...">
                    </div>
                    <div class="contact-group">
                        <div class="contact-label">Vấn đề cần hỗ trợ</div>
                        <textarea name="message" id="message" placeholder="Nhập vấn đề của bạn..." rows="5" cols="30" style="resize: none;" required></textarea>
                    </div>
                </div>
        </div class="contac-button">
        <button type="submit">Gửi</button>
    </div>
    </form>
    
</div>
</div>

</div>