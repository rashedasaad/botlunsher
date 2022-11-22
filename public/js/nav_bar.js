//$/
let bullet = document.querySelectorAll(`.nav-bullets .bullet`);
var tru = true;
let turn = 0;
const rest = async () => {
    text_h1.style.transition = ``;
    text_p.style = "transition: ``; transition-delay: ``;";
    titel.style = "transition: ``; transition-delay: ``;";
    navBullets.style = "transition-delay: ``;";
    landing_img.style = "transition: ``; transition-delay: ``;";
    // "   "
    text_h1.style = "transition: ease 2s; left: -100;";
    text_p.style = "transition: ease 2s; transition-delay: 1s; left: -130%";
    titel.style = "transition: ease 2s; transition-delay: 1s; bottom: -428%;";
    landing_img.style = "transition: ease 2s; transition-delay: 1s; top: 100%";
    await sleep(500);
}
//!!
bullet[0].onclick = async () => {
    rest();
    if (!tru) {
        await sleep(500);
    }
    tru = false;
    if (turn != 1) {
        aboute.target.style.display = `none`;
        discord.target.style.display = `none`;
        strore.target.style.display = `none`;
        Pricing.target.style.display = `none`;
        footer.target.style.display = `none`;

        landing_page.target.style.display = `block`;
        nav_bullets.target.style = " position: absolute;left: 190%;top: 50%;transform: translate(-50%, -50%);z-index: 1;opacity: 1;"
        for (let h6 of navBullets_h6) {
            h6.style = "position: absolute;height: 0;width: 0;right: max(-1.5vw, -1.5em);z-index: 10;border-style: solid;border-width: max(0.5vw, 0.5em);border-radius: max(1vw, 2em);top: 50%;transform: translateY(-50%);border-color: transparent transparent transparent $color-blue;";
        }
        for (let span of navBullets_span) {
            span.style = "position: absolute;left: 50%;transform: translate(-50%, -50%);top: 50%;width: max(1vw, 1em);height: max(1vw, 1em);background-color: #6C63FF;border-radius: 50%;";
        }
        for (let bullet of bullets) {
            bullet.style = "position: relative;border-radius: 50%;width: max(2vw, 2em);height: max(2vw, 2em);background-color: transparent;border: max(0.2vw, 0.2em) solid white;margin: max(1vw, 1em) max(1vw, 1em) max(1vw, 1em) max(1vw, 1em);cursor: pointer;"
        }
        for (let tooltip of tooltips) {
            tooltip.style = "background-color: #6C63FF;width: max(7vw, 7em);color: white; padding: max(0.5vw, 0.5em) max(1vw, 1em);position: absolute;right: max(3vw, 3em);font-size: max(1vw, 1em);top: max(-0.2vw, -0.2em);text-align: center;cursor: default;pointer-events: none;border-radius: max(0.2vw, 0.2em);display: none;"
        }
        await landing();
        await sleep(500);
    }
    turn = 1
}
//!
bullet[1].onclick = async () => {
    rest()
    if (!tru) {
        await sleep(500)
    }
    tru = false
    if (turn != 2) {
        discord.target.style.display = `none`;
        strore.target.style.display = `none`;
        footer.target.style.display = `none`;

        for (let tooltip of tooltips) {
            tooltip.style.transition = `ease 2s`;
            tooltip.style = "display: block;position: inherit;font-size: max(1.5vw, 1.5em);text-align: center;padding: 0;cursor: default;right: 0;pointer-events: none;background-color: transparent;width: fit-content;top: 0; color: #ecb365;"
        }
        effect_container.target.style = " z-index: 0;";
        effect_children.target.style.opacity = `0`;
        effect_children.target.style.transition = `ease 2s`;
        await sleep(500);
        effect_children.target.style.transform = `rotate(137deg)`;
        effect_children.target.style.opacity = `1`;
        for (let effect_c of span) {
            effect_c.style.backgroundColor = `#ECB365`;
            effect_c.style.boxShadow = "0 0 0 10px rgb(11 11 11 / 27%), inset 0 0 8px #000000, 0 0 100px #ecb365";
        }

        landing_page.target.style.display = `none`;
        aboute.target.style.display = `block`;

        nav_bullets.target.style = "position: absolute;height: 72vh; background-color: rgb(24 21 55 / 44%);backdrop-filter: blur(12px);padding: 20px;box-shadow: #00000075 0px 0px 13px 4px;display: flex;left: 50%;flex-flow: column wrap;align-content: center;transform: translate(-50%, -50%);align-items: center;justify-content: space-between; z-index: 1;"
        for (let h6 of navBullets_h6) {
            h6.style = "height: 0;width: 0;right: 0;border-style: solid;border-width: 0;border-radius: 0;top: 0;transform: translateY(0%);border-color: transparent transparent transparent transparent;";
        }
        for (let span of navBullets_span) {
            span.style = "left: 0;transform: translate(0px, 0px);top: 0;width: 0;height: 0;background-color: transparent;border-radius: 0;";
        }
        for (let bullet of bullets) {
            bullet.style = " position: relative;cursor: pointer;width: fit-content;font-size: max(1vw, 1em);height: fit-content;margin: 20px auto; border: none;border-radius: 0px;"
        }
        for (let tooltip of tooltips) {
            tooltip.style = "color:#ECB365;display: block;position: inherit;font-size: max(1.5vw, 1.5em);text-align: center;padding: 0;cursor: default;right: 0;pointer-events: none;background-color: transparent;width: fit-content;top: 0;"
        }

        for (let left of lefts) {
            left.style.transition = `ease 2s`;
            await sleep(500);
            left.style.left = `0`;
        }
        await sleep(500);
        for (let right of rights) {
            right.style.transition = `ease 2s`;
            right.style.right = `0`;
        }
        await sleep(500);
    }
    turn = 2;
}
//!
bullet[2].onclick = async () => {
    rest()
    if (!tru) {
        await sleep(500)
    }
    tru = false
    if (turn != 3) {
        landing_page.target.style.display = `none`;
        strore.target.style.display = `none`;
        footer.target.style.display = `none`;
        aboute.target.style.display = `none`;

        for (let tooltip of tooltips) {
            tooltip.style.transition = `ease 2s`;
            tooltip.style = "display: block;position: inherit;font-size: max(1.5vw, 1.5em);text-align: center;padding: 0;cursor: default;right: 0;pointer-events: none;background-color: transparent;width: fit-content;top: 0; color: #6C63FF;"
        }
        effect_children.target.style.opacity = `0`;
        effect_children.target.style.transition = `ease 2s`;
        await sleep(500);
        effect_children.target.style.transform = `rotate(227deg)`;
        effect_children.target.style.opacity = `1`;
        for (let effect_c of span) {
            effect_c.style.backgroundColor = `#6C63FF`;
            effect_c.style.boxShadow = "0 0 0 0px rgb(11 11 11 / 0%), inset 0 0 20px 0px #000000, inset 0 0 77px 0px #000000";
        }

        nav_bullets.target.style = "position: absolute;height: 72vh; background-color: rgb(24 21 55 / 44%);backdrop-filter: blur(12px);padding: 20px;box-shadow: #00000075 0px 0px 13px 4px;display: flex;left: 50%;flex-flow: column wrap;align-content: center;transform: translate(-50%, -50%);align-items: center;justify-content: space-between;"
        for (let h6 of navBullets_h6) {
            h6.style = "height: 0;width: 0;right: 0;z-index: 0;border-style: solid;border-width: 0;border-radius: 0;top: 0;transform: translateY(0%);border-color: transparent transparent transparent transparent;";
        }
        for (let span of navBullets_span) {
            span.style = "left: 0;transform: translate(0px, 0px);top: 0;width: 0;height: 0;background-color: transparent;border-radius: 0;";
        }
        for (let bullet of bullets) {
            bullet.style = " position: relative;cursor: pointer;width: fit-content;font-size: max(1vw, 1em);height: fit-content;margin: 20px auto; border: none;border-radius: 0px;"
        }
        for (let tooltip of tooltips) {
            tooltip.style = "display: block;color: #6c63ff;position: inherit;font-size: max(1.5vw, 1.5em);text-align: center;padding: 0;cursor: default;right: 0;pointer-events: none;background-color: transparent;width: fit-content;top: 0;"
        }

        // 
        for (let contents of content) {
            contents.style.transition = `ease 2s`;
            contents.style.color = `#6C63FF`;
        }
        for (let nameImgess of nameImges) {
            nameImgess.style.transition = `ease 2s`;
            nameImgess.style.color = `#6C63FF`;
        }
        // 
        discord.target.style.display = `grid`;
        // 
        for (let left_discord of lefts_discords) {
            left_discord.style.transition = `ease 2s`;
            await sleep(500);
            left_discord.style.left = `0`;
        }
        for (let right_discord of rights_discords) {
            right_discord.style.transition = `ease 2s`;
            right_discord.style.right = `0`;
        }
        // 
    }
    turn = 3
}
//!
bullet[3].onclick = async () => {
    rest()
    if (!tru) {
        await sleep(500);
    }
    tru = false
    if (turn != 4) {
        landing_page.target.style.display = `none`;
        aboute.target.style.display = `none`;
        footer.target.style.display = `none`;
        discord.target.style.display = `none`;

        effect_children.target.style.opacity = `0`;
        for (let tooltip of tooltips) {
            tooltip.style.transition = `ease 2s`;
            tooltip.style = "display: block;position: inherit;font-size: max(1.5vw, 1.5em);text-align: center;padding: 0;cursor: default;right: 0;pointer-events: none;background-color: transparent;width: fit-content;top: 0; color: #6C63FF;"
        }
        effect_container.target.style = " z-index: 0;";
        effect_children.target.style.transition = `ease 2s`;
        await sleep(500);
        effect_children.target.style.transform = `rotate(227deg)`;
        effect_children.target.style.transition = `ease 2s`;
        effect_children.target.style.opacity = `1`;
        for (let effect_c of span) {
            effect_c.style.backgroundColor = `#6C63FF`;
            effect_c.style.boxShadow = "0 0 0 0px rgb(11 11 11 / 0%), inset 0 0 20px 0px #000000, inset 0 0 77px 0px #000000";
        }

        nav_bullets.target.style = "position: absolute;background-color: rgb(24 21 55 / 40%);backdrop-filter: blur(30px); padding: 20px;box-shadow: black 0px 0px 16px -3px;display: flex;gap: 75px;left: 50%;width: 79%;flex-flow: row wrap;align-content: center;transform: translate(-50%, -50%);align-items: cente";
        for (let h6 of navBullets_h6) {
            h6.style = "height: 0;width: 0;right: 0;z-index: 0;border-style: solid;border-width: 0;border-radius: 0;top: 0;transform: translateY(0%);border-color: transparent transparent transparent transparent;";
        }
        for (let span of navBullets_span) {
            span.style = "left: 0;transform: translate(0px, 0px);top: 0;width: 0;height: 0;background-color: transparent;border-radius: 0;";
        }
        for (let bullet of bullets) {
            bullet.style = " position: relative;cursor: pointer;width: fit-content;font-size: max(1vw, 1em);height: fit-content;margin: 20px auto; border: none;border-radius: 0px;"
        }
        await sleep(500);

        strore.target.style.display = `block`;
        for (let nameImgess of nameImges) {
            nameImgess.style.transition = `ease 2s`;
            nameImgess.style.color = `#6C63FF`;
        }
        card1_top.style.transition = `ease 2s`;
        await sleep(500)
        card1_top.style.left = `0`;
        card1_bottom.style.transition = `ease 2s`;
        await sleep(500)
        card1_bottom.style.right = `0`;
    }
    turn = 4;
}
//!
bullet[4].onclick = async () => {
    rest()
    if (!tru) {
        await sleep(500)
    }
    tru = false
    if (turn != 5) {
        landing_page.target.style.display = `none`;
        aboute.target.style.display = `none`;
        strore.target.style.display = `none`;
        discord.target.style.display = `none`;
        footer.target.style.display = `none`;

        effect_children.target.style.opacity = `0`;
        Pricing.target.style.display = `block`;
        nav_bullets.target.style = " position: absolute;background-color: rgb(0, 206, 121);backdrop-filter: blur(30px);padding: 20px;box-shadow: black 0px 0px 16px -3px;display: flex;gap: 75px;left: 50%;top: 480px;width: 79%;flex-flow: row wrap;align-content: center;transform: translate(-50%, -360px);transition: all 1.3s ease 0s;flex-wrap: wrap;";
        for (let bullet of bullets) {
            bullet.style = " position: relative;cursor: pointer;width: fit-content;font-size: max(1vw, 1em);height: fit-content;margin: 20px auto; border: none;border-radius: 0px;"
        }
        for (let tooltip of tooltips) {
            tooltip.style.transition = `ease 2s`;
            tooltip.style = "display: block;position: inherit;font-size: max(2vw, 2em);text-align: center;padding: 0;cursor: default;right: 0;pointer-events: none;background-color: transparent;width: fit-content;top: 0; color: black;"
        }
        for (let h6 of navBullets_h6) {
            h6.style = "height: 0;width: 0;right: 0;z-index: 0;border-style: solid;border-width: 0;border-radius: 0;top: 0;transform: translateY(0%);border-color: transparent transparent transparent transparent;";
        }
        for (let span of navBullets_span) {
            span.style = "left: 0;transform: translate(0px, 0px);top: 0;width: 0;height: 0;background-color: transparent;border-radius: 0;";
        }
        effect_container.target.style = " z-index: 1;";
        await sleep(500);
        effect_children.target.style.transform = `rotate(141deg)`;
        effect_children.target.style.transition = `ease 2s`;
        effect_children.target.style.opacity = `1`;
        for (let effect_c of span) {
            effect_c.style.backgroundColor = `#212121`;
            effect_c.style.boxShadow = `#00ce79 0px 0px 0px 0px, #00ce79 0px 0px 0px 0px inset, #00ce79 0px 0px 41px 0px inset`;
        }
    }
    turn = 5;
}
//!
bullet[5].onclick = async () => {
    rest()
    if (!tru) {
        await sleep(500)
    }
    tru = false
    if (turn != 5) {
        landing_page.target.style.display = `none`;
        aboute.target.style.display = `none`;
        strore.target.style.display = `none`;
        discord.target.style.display = `none`;
        Pricing.target.style.display = `none`;

        effect_children.target.style.opacity = `0`;
        footer.target.style.display = `block`;
        nav_bullets.target.style = " position: absolute;background-color: rgb(0, 206, 121);backdrop-filter: blur(30px);padding: 20px;box-shadow: black 0px 0px 16px -3px;display: flex;gap: 75px;left: 50%;top: 50%;width: 79%;flex-flow: row wrap;align-content: center;transform: translate(-50%, -50%);transition: all 1.3s ease 0s;flex-wrap: wrap;";
        for (let bullet of bullets) {
            bullet.style = " position: relative;cursor: pointer;width: fit-content;font-size: max(1vw, 1em);height: fit-content;margin: 20px auto; border: none;border-radius: 0px;"
        }
        for (let tooltip of tooltips) {
            tooltip.style.transition = `ease 2s`;
            tooltip.style = "display: block;position: inherit;font-size: max(2vw, 2em);text-align: center;padding: 0;cursor: default;right: 0;pointer-events: none;background-color: transparent;width: fit-content;top: 0; color: black;"
        }
        for (let h6 of navBullets_h6) {
            h6.style = "height: 0;width: 0;right: 0;z-index: 0;border-style: solid;border-width: 0;border-radius: 0;top: 0;transform: translateY(0%);border-color: transparent transparent transparent transparent;";
        }
        for (let span of navBullets_span) {
            span.style = "left: 0;transform: translate(0px, 0px);top: 0;width: 0;height: 0;background-color: transparent;border-radius: 0;";
        }
        effect_container.target.style = " z-index: 0;";
        await sleep(500);
        effect_children.target.style.transform = `rotate(141deg)`;
        effect_children.target.style.transition = `ease 2s`;
        effect_children.target.style.opacity = `1`;
        for (let effect_c of span) {
            effect_c.style.backgroundColor = `#212121`;
            effect_c.style.boxShadow = `#00ce79 0px 0px 0px 0px, #00ce79 0px 0px 0px 0px inset, #00ce79 0px 0px 41px 0px inset`;
        }
        card_left.style.transition = `ease 2s`;
        await sleep(500);
        card_left.style.right = `max(0vw, 0em)`;
        card_right.style.transition = `ease 2s`;
        await sleep(500);
        card_right.style.left = `max(0vw, 0em)`;
        await sleep(500);
        text_left.style.transition = `ease 2s`;
        text_left.style.right = `0%`;
        await sleep(500);
        text_right.style.transition = `ease 2s`;
        text_right.style.left = `0%`;
    }
    turn = 5;
}
//!!