0005 ; *** U F O - J A G D ***
0010 GESCHW EQU  #0F
0020 RDEL   EQU  #38
0030 IN     EQU  #62
0040 PRS    EQU  #28
0050 RIN    EQU  #08
0060 ROUT   EQU  #F7
0070 CS     EQU  #0C
0080              SKIP
0090 UFOJGD ORG  #0C80
0095        ENT
0100        RST  PRS
0105        DEFB CS
0110        DEFM /START (G):/
0120        DEFB 0
0130 UFOJ1  RST  RIN
0140        CP   #47
0150        JR   NZ,UFOJ1
0160        RST  PRS
0170        DEFB CS,#00
0180        LD   HL,UFOTXT
0190        LD   DE,#0BCA
0200        LD   BC,#0027
0210        LDIR
0220 UFOJ2  LD   BC,#0100
0230        EXX
0240        LD   BC,#013D
0250        LD   IX,#088A
0260 UFOJ3  LD   IY,#0BAA
0270        LD   (IY-1),#03
0280        LD   (IY+0),#5E
0290        LD   (IY+1),#4C
0300 UFOJ4  RST  RDEL
0305        RST  RDEL
0310        DJNZ UFOJ5
0320 GESCHA LD   B,GESCHW
0330        LD   (IX-5),#20
0340        LD   (IX-4),#17
0350        LD   (IX-3),#05
0360        LD   (IX-2),#05
0370        LD   (IX-1),#05
0380        LD   (IX+0),#3E
0390        INC  IX
0400        DEC  C
0410        XOR  A
0420        CP   C
0430        JR   NZ,UFOJ5
0440        LD   C,#3D
0450        LD   A,#32
0460        LD   HL,#0BD7
0470        CP   (HL)
0480        JR   Z,UFOJ1
0490        INC  HL
0500        CALL ZAEHL
0510        LD   IX,#088A
0520 UFOJ5  EXX
0530        XOR  A
0540        CP   C
0550        JR   NZ,UFOJ6
0560        SCAL IN
0570        JR   NC,UFOJ9
0580        LD   C,#0F
0590 UFOJ6  DJNZ UFOJ9
0600        LD   (IY+0),#20
0610        DEC  C
0620        XOR  A
0630        CP   C
0640        JR   NZ,UFOJ7
0650        INC  B
0660        LD   C,0
0670        EXX
0675        JR   UFOJ3
0680 UFOJ7  LD   B,#06
0690        PUSH BC
0700        LD   B,#40
0710 UFOJ8  DEC  IY
0720        DJNZ UFOJ8
0730        POP  BC
0740        LD   A,(IY+0)
0750        CP   #20
0760        JR   NZ,$+#0A
0770        LD   (IY+0),#5E
0780 UFOJ9  EXX
0790        JP   UFOJ4
0800        LD   HL,#0BEF
0810        CALL ZAEHL
0820        CALL BLITZ
0830        LD   A,#32
0840        LD   HL,#0BD7
0850        CP   (HL)
0860        JP   Z,UFOJ1
0870        INC  HL
0880        CALL ZAEHL
0890        JP   UFOJ2
0900        SKIP
0910 CLSCR  LD   D,#20
0920 CLSCR0 LD   HL,#0BBA
0930 CLSCR1 LD   A,L
0940        CP   #0A
0950        JR   NZ,CLSCR2
0960        LD   A,H
0970        CP   #08
0980        RET  Z
0990 CLSCR2 DEC  HL
1000        LD   (HL),D
1010        JR   CLSCR1
1020        SKIP
1030 ZAEHL  LD   A,R
1040        AND  #0A
1050        OR   #04
1060        LD   (GESCHA+1),A
1070        LD   DE,#3039
1080        LD   A,(HL)
1090        INC  (HL)
1100        CP   E
1110        RET  NZ
1120        LD   (HL),D
1130        DEC  HL
1140        INC  (HL)
1150        RET
1160        SKIP
1170 BLITZ  LD   B,#03
1180 BLITZ1 LD   D,#2A
1190        CALL CLSCR0
1200        CALL WAIT
1210        CALL CLSCR
1220        CALL WAIT
1230        DJNZ BLITZ1
1240        RET
1250        SKIP
1260 WAIT   PUSH BC
1270        LD   B,#06
1280 WAIT1  RST  RDEL
1285        RST  RDEL
1290        DJNZ WAIT1
1300        POP  BC
1310        RET
1320 UFOTXT DEFM /UFO-JAGD     /
1330        DEFM /01. UFO    /
1340        DEFM /Abschuesse: 00 /
1350        DEFB 0
