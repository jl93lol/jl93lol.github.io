# -*- coding: utf-8 -*-
import os
import discord
import random
from datetime import datetime

intents = discord.Intents.default()
intents.message_content = True
start_datetime = datetime.now().strftime("%d/%m/%Y %H:%M:%S")

client = discord.Client(intents=intents)
gengshuang_head_true = [
    "我们注意到有关报道，对#N#B表示欢迎。",
    "中方支持并赞赏#N作出#B这一重要决定。",
    "我们很高兴听闻这则消息。",
    "今天#N成功#B，中方对此表示祝贺和欢迎。",
    "中方对此的看法是：",
    "我们对#N#B的友善之举表示诚挚的感谢。",
    "中方高度赞赏#N#B。"
]
gengshuang_sentence_true = [
    "中方愿继续同国际社会一道，为#N#B提供力所能及的帮助。",
    "#B，是#N各界的普遍期待，符合两国和两国人民的根本和长远利益。",
    "我们欢迎#N抓住历史机遇，在和平共处五项原则基础上#B。",
    "面对新机遇新挑战，中方愿同#N一道#B。",
    "中方一贯主张，#B应秉持客观、公正、专业原则，以确凿证据为依据，以各方共识为基础。",
    "中方对#N#B表示祝贺。中国与#N传统友谊深厚，双方是患难与共的好兄弟，真诚相待的好朋友，共同发展的好伙伴。",
    "中方一贯重视与#N展开多领域合作，支持#N#B。",
    "作为中国与#N人文交流的重要内容，#B长期以来有力地促进了两国人民之间的沟通和相互了解。",
    "我们希望#N有关各方在宪法和法律框架内和平#B。",
    "同时我们希望#N在#B过程中秉持公平、透明、非歧视原则，对各方一视同仁。",
    "中方愿为#N#B发挥积极作用。",
    "中方愿同#N一道，以#B为契机，增进政治互信，深化互利合作，加强在国际和地区事务中的沟通协调，造福两国人民。",
    "中国和#N互为战略伙伴。自建交以来，双方关系取得长足发展，各领域务实合作成果丰硕。",
    "中方愿同#N一道努力，巩固友好互信，深化互利合作，推动战略伙伴关系取得更大发展。",
    "中国和#N建交以来，两国各领域交流合作快速展开，成果持续显现，增进了两国人民的福祉。",
    "当前，中国同#N关系快速发展。两国人民一直相互怀有友好感情。",
    "中方愿在一个中国原则和和平共处五项原则基础上，同#N加强各领域务实合作和友好交流，造福两国和两国人民。",
    "中国与#N的合作始终遵循平等互利、合作共赢和商业化原则开展，合法合规，利国利民，不容他国置喙。",
    "中方坚信，不论形势如何变化，中国与#N的合作都会正常开展下去。",
    "我们愿意与#N共同努力，开启两国关系发展新的广阔前景。",
    "事实充分证明，中国与#N关系的发展不仅给两国人民带来巨大利益，也有力地促进了亚太地区和世界的和平、稳定、繁荣。",
    "中国与#N是好朋友、好伙伴、好兄弟。",
    "中方愿同#N一道，继续加强战略沟通，深化务实合作，深入落实两国元首共识，推动全面战略伙伴关系不断迈上新台阶。",
    "我们期待与#N各方继续保持密切沟通与合作。",
    "中方尊重#N人民的选择，也呼吁国际社会尊重#N主权，尊重#N人民自主作出的选择，不要干涉#N内政。",
    "我们希望#N能够同中方相向而行、共同努力。",
    "我们相信，此举将进一步推动落实双方元首重要共识，巩固双方政治互信，促进中国与#N创新战略伙伴关系深入发展。",
    "#N此举这符合双方的共同利益，也是两国人民的共同期待。",
    "中国与#N双方一致同意，保持密切高层交往和更紧密的战略沟通，及时就重大问题协调立场。",
    "#N此举取得丰硕成果，将为中国与#N全天候战略合作伙伴关系增添新的动力。",
    "我们刚刚隆重庆祝了新中国成立70周年，#N向中方送上了真挚美好的祝福，我们对此表示诚挚的感谢。",
    "我能告诉你的是，中国与#N一直按照平等互信、互利共赢的原则，在各领域保持着正常的交流合作。",
    "立足新时代，放眼新未来，双方将进一步加强协调配合，承担起维护多边主义、捍卫国际秩序的共同责任，推进全面战略协作不断取得新成果。",
    "我们愿同#N共同努力，携手推动中国与#N关系不断取得新的发展，打造新时代更加紧密的命运共同体。",
    "我们坚持在国际事务中发挥积极作用，为推动全球治理体系改革贡献“中国智慧”，为斡旋解决国际地区热点问题贡献“中国力量”，为世界经济发展注入“中国信心”。",
    "中国始终是世界和平的建设者、全球发展的贡献者、国际秩序的维护者。"
]
gengshuang_head_false = [
    "对于#N#B的行为，我的回答是：",
    "中方就这一问题已多次表明立场：",
    "我们一再强调：",
    "我们此前已多次作出回应：",
    "我们已多次表明中方立场：",
    "中方对此严正声明：",
    "中方就#N近来的一系列错误言行，已经多次向#N表明我们的严正立场："
]
gengshuang_sentence_false = [
    "#N#B的举动严重干涉了中国内政，严重违反国际法和国际关系基本准则，是赤裸裸的霸权行径，中国政府和人民坚决反对。",
    "#N罔顾事实、颠倒黑白，公然#B，性质极其恶劣，用心十分险恶，其根本目的是干涉中国内政，破坏中华民族实现伟大复兴的历史进程。",
    "#B只会让广大中国人民进一步认清#N的险恶用心和霸权本质，只会让中国人民更加众志成城。",
    "中国政府和中国人民坚决反对#N#B的行为，中方已就此向#N提出严正交涉和强烈抗议。",
    "中方强烈敦促#N不得#B，以免影响两国关系和两国在重要领域的合作。",
    "中方强烈谴责并坚决反对#N#B，已就此向#N提出了严正交涉。",
    "#N如果#B，不仅将损害中方利益，损害中国和#N关系，也将严重损害#N自身的利益。",
    "#N如果一意孤行，坚持#B，最终必将搬起石头砸自己的脚。",
    "#N#B是搬起石头砸自己的脚。",
    "我们要正告#N，任何外国政府和势力都无权干预中国内政。",
    "#N的图谋注定失败。",
    "中国政府反对任何外部势力干预中国事务的决心坚定不移，维护国家主权、安全、发展利益的决心坚定不移。",
    "我们奉劝#N不要一意孤行，否则中方必将予以坚决反制，由此产生的一切后果必须由#N承担。",
    "希望#N个别人士能以开放的心态和客观公正的态度对待中国，不要无中生有。",
    "#N有关人士的陈词滥调充满了政治偏见与谎言。",
    "我要强调，中国内政不容任何外部反华势力指手画脚。",
    "中国一向秉持和平共处五项原则处理国与国关系，历来坚定奉行不干涉内政原则，主张各国根据自身国情选择发展道路。",
    "#N的拙劣表演充分暴露出其不可告人的险恶用心和政治企图。",
    "中国坚持走和平发展道路，积极为维护世界和平稳定贡献智慧力量。",
    "中国坚持对外开放，互利共赢，同世界分享中国发展的机遇。",
    "#N自己不愿意投入，却千方百计干扰破坏中国和其他国家开展合作。",
    "#N试图挑拨中国共产党和中国人民的关系，极其阴险。",
    "任何妄图否定中国的社会主义制度、挑拨中国共产党和中国人民关系的政治图谋都注定不会得逞！",
    "我要告诉#N一些政客，人贵有自知之明，请他还是趁早反省一下#N自身的问题，放弃偏见和执念，停止喋喋不休的反华聒噪。",
    "还是我们经常说的那句话，请#N不要高估自己的造谣能力，也不要低估别人的判断能力。谎言重复一千遍，依然还是谎言。",
    "对于#N干涉中国内政、损害中方利益的行径，中方必将采取有力措施坚决反制。任何人都不要低估中方维护国家主权、安全、发展利益的坚定决心。",
    "如果#N一意孤行，中方必将采取有力措施予以坚决反制。",
    "我们奉劝某些政客别再浪费#N纳税人的钱，无事生非。",
    "中方已就此向#N提出严正交涉，表达强烈抗议。",
    "我们敦促#N立即停止此类挑衅行为，不要逆势而动，避免损害地区的和平与安宁。中方将采取一切必要措施，坚定维护国家主权和安全。",
    "我们奉劝#N有关媒体和人士尊重已经明确无误的事实和真相，恪守起码的职业道德操守，放下意识形态偏见，摘掉有色眼镜，不要再做不负责任、徒增笑柄的事情。",
    "#N罔顾事实、混淆是非、违反公理，玩弄双重标准，公然插手中国事务，干涉中国内政，严重违反国际法和国际关系基本准则，中方对此表示强烈谴责和坚决反对。",
    "#N任何企图干预中国内政、阻碍中国发展的把戏都不会得逞，到头来只会是枉费心机一场空。",
    "#N这一恶劣行径不仅损害中方利益，也会损害#N自身的重要利益。",
    "我们希望#N认真对待中方的严正交涉和严正立场，立即停止不负责任的言行，停止干涉中国内政。",
    "我们敦促#N在中国问题上要谨言慎行，不要再发出错误信号，不要再挑拨怂恿，不要再干涉中国内政。",
    "对于#N的错误做法，中方必将采取有力的措施坚决予以反制，坚定地维护自身主权、安全、发展利益。",
    "#N此次的貌似公允再次暴露出他们的是非不分和虚伪面目，他们的口头正义也再次暴露出他们的双重标准和别有用心。",
    "我们正告#N认清形势，悬崖勒马，立即停止干涉中国内政，以免引火烧身、自食苦果。",
    "中方正告#N，任何企图破坏中国社会繁荣稳定、阻碍中国发展的图谋都不会得逞，到头来只会搬起石头砸自己的脚。",
    "我们敦促#N悬崖勒马，否则必将自食恶果，勿谓言之不预也！",
    "我这样的#N，能和中国相提并论吗！",
    "#N的一些政客和官员隔三差五就要出来叫一叫、跳一跳,攻击抹黑中国，他们的拙劣表演充分暴露出其不可告人的险恶用心和政治企图。",
    "在国际社会大家庭里,中国始终维护和平,促进发展,坚守道义,同各国携手构建人类命运共同体。#N却损人利己,唯我独尊,背信弃义,在世界上大搞顺我者昌,逆我者亡。",
    "#N#B干预干涉中国内政，严重违反国际法和国际关系基本准则，是赤裸裸的霸权行径。"
]

@client.event
async def on_ready():
    print(f'We have logged in as {client.user}')

@client.event
async def on_message(message):
    content = message.content
    send_pending = ""
    if message.author == client.user:
        return

    if content.lower().startswith("fuck you"):
        await message.channel.send("Thank you!")

    elif content.startswith("$help"):
        await message.channel.send("""
**Discord bot version: v1.0**
**Creator: Unknown**
**Date of publication: 30/09/2022**
**The bot has been running since {0}**
        
`$help`
seek help from President XI

`$gengshuang [true/false] [發言對象] [對方幹了什麼事情]`
_Example: $gengshuang false 俄罗斯 入侵乌克兰_
Foreign Ministry Spokesperson Simulator
        """.format(start_datetime))

    elif content.startswith("$gengshuang"):
        used_sentence = []
        if content.split("gengshuang ")[1].lower().startswith("t"):
            num1 = random.randint(0,len(gengshuang_head_true) - 1)
            send_pending = ("记者：#N#B，中方对此有何回应？\n\n耿爽：").replace("#N",content.split(" ")[2]).replace("#B",content.split(content.split(" ")[2] + " ")[1]) + gengshuang_head_true[num1].replace("#N",content.split(" ")[2]).replace("#B",content.split(content.split(" ")[2] + " ")[1])
            
            for i in range(3):
                num2 = 0
                if i == 0:
                    num2 = round(random.randint(3,len(gengshuang_sentence_true) - 1) / 3)
                elif i == 1:
                    num2 = round(random.randint(6,len(gengshuang_sentence_true) - 1) / 2)
                    send_pending += ("\n\n")
                else:
                    num2 = random.randint(2,5)
                    send_pending += ("\n\n")
                for i2 in range(num2):
                    is_new = False
                    while not is_new:
                        dummy = gengshuang_sentence_true[random.randint(0,len(gengshuang_sentence_true) - 1)]
                        if not dummy in used_sentence:
                            send_pending += dummy.replace("#N",content.split(" ")[2]).replace("#B",content.split(content.split(" ")[2] + " ")[1])
                            used_sentence.append(dummy)
                            is_new = True

            await message.channel.send(send_pending)
        if content.split("gengshuang ")[1].lower().startswith("f"):
            num1 = random.randint(0,len(gengshuang_head_false) - 1)
            send_pending = ("记者：#N#B，中方对此有何回应？\n\n耿爽：").replace("#N",content.split(" ")[2]).replace("#B",content.split(content.split(" ")[2] + " ")[1]) + gengshuang_head_false[num1].replace("#N",content.split(" ")[2]).replace("#B",content.split(content.split(" ")[2] + " ")[1])
            
            for i in range(3):
                num2 = 0
                if i == 0:
                    num2 = round(random.randint(3,len(gengshuang_sentence_false) - 1) / 3)
                elif i == 1:
                    num2 = round(random.randint(6,len(gengshuang_sentence_false) - 1) / 2)
                    send_pending += ("\n\n")
                else:
                    num2 = random.randint(2,5)
                    send_pending += ("\n\n")
                for i2 in range(num2):
                    is_new = False
                    while not is_new:
                        dummy = gengshuang_sentence_false[random.randint(0,len(gengshuang_sentence_false) - 1)]
                        if not dummy in used_sentence:
                            send_pending += dummy.replace("#N",content.split(" ")[2]).replace("#B",content.split(content.split(" ")[2] + " ")[1])
                            used_sentence.append(dummy)
                            is_new = True

            await message.channel.send(send_pending)
    
    elif content.startswith("$"):
        try:
            float(content.split("$")[1].split(" ")[0])
        except ValueError:
            await message.channel.send("""
**Error: Unknown command.**
You may type in `$help` to get help from president XI.
            """)

client.run(os.getenv("DISCORD_TOKEN"))